<?php

namespace Tests\Feature\Admin;

use App\Models\Departemen;
use App\Models\Fakultas;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FakultasTest extends TestCase
{
    use RefreshDatabase;

    private User $superAdmin;
    private User $adminFakultas;
    private User $adminDepartemen;
    private Fakultas $fakultas;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fakultas        = Fakultas::factory()->create();
        $departemen            = Departemen::factory()->create(['fakultas_id' => $this->fakultas->id]);
        $this->superAdmin      = User::factory()->superAdmin()->create();
        $this->adminFakultas   = User::factory()->adminFakultas()->create(['fakultas_id' => $this->fakultas->id]);
        $this->adminDepartemen = User::factory()->adminDepartemen()->create([
            'fakultas_id'   => $this->fakultas->id,
            'departemen_id' => $departemen->id,
        ]);
    }

    // -------------------------------------------------------
    // Index (semua admin bisa lihat)
    // -------------------------------------------------------

    public function test_super_admin_can_view_fakultas_list(): void
    {
        $this->actingAs($this->superAdmin)
            ->get(route('fakultas.index'))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_can_view_fakultas_list(): void
    {
        $this->actingAs($this->adminFakultas)
            ->get(route('fakultas.index'))
            ->assertStatus(200);
    }

    public function test_admin_departemen_can_view_fakultas_list(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->get(route('fakultas.index'))
            ->assertStatus(200);
    }

    // -------------------------------------------------------
    // Create (hanya SuperAdmin)
    // -------------------------------------------------------

    public function test_super_admin_can_view_create_fakultas_form(): void
    {
        $this->actingAs($this->superAdmin)
            ->get(route('fakultas.create'))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_cannot_view_create_fakultas_form(): void
    {
        $this->actingAs($this->adminFakultas)
            ->get(route('fakultas.create'))
            ->assertStatus(403);
    }

    public function test_admin_departemen_cannot_view_create_fakultas_form(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->get(route('fakultas.create'))
            ->assertStatus(403);
    }

    // -------------------------------------------------------
    // Store
    // -------------------------------------------------------

    public function test_super_admin_can_create_fakultas(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->post(route('fakultas.store'), [
                'kode'      => 'FK01',
                'nama'      => 'Fakultas Teknik',
                'deskripsi' => 'Deskripsi fakultas teknik',
            ]);

        $response->assertRedirect(route('fakultas.create'));
        $this->assertDatabaseHas('fakultas', ['kode' => 'FK01', 'nama' => 'Fakultas Teknik']);
    }

    public function test_admin_fakultas_cannot_create_fakultas(): void
    {
        $this->actingAs($this->adminFakultas)
            ->post(route('fakultas.store'), [
                'kode' => 'FK02',
                'nama' => 'Fakultas Baru',
            ])
            ->assertStatus(403);
    }

    public function test_store_validates_required_fields(): void
    {
        $this->actingAs($this->superAdmin)
            ->post(route('fakultas.store'), [])
            ->assertSessionHasErrors(['kode', 'nama']);
    }

    public function test_store_validates_kode_max_length(): void
    {
        $this->actingAs($this->superAdmin)
            ->post(route('fakultas.store'), [
                'kode' => 'TOOLONGKODE',
                'nama' => 'Fakultas Teknik',
            ])
            ->assertSessionHasErrors('kode');
    }

    // -------------------------------------------------------
    // Edit & Update
    // -------------------------------------------------------

    public function test_super_admin_can_view_edit_fakultas_form(): void
    {
        $this->actingAs($this->superAdmin)
            ->get(route('fakultas.edit', $this->fakultas))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_cannot_edit_fakultas(): void
    {
        $this->actingAs($this->adminFakultas)
            ->get(route('fakultas.edit', $this->fakultas))
            ->assertStatus(403);
    }

    public function test_super_admin_can_update_fakultas(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->put(route('fakultas.update', $this->fakultas), [
                'kode' => 'FK99',
                'nama' => 'Nama Baru',
            ]);

        $response->assertRedirect(route('fakultas.index'));
        $this->assertDatabaseHas('fakultas', ['id' => $this->fakultas->id, 'nama' => 'Nama Baru']);
    }

    public function test_admin_fakultas_cannot_update_fakultas(): void
    {
        $this->actingAs($this->adminFakultas)
            ->put(route('fakultas.update', $this->fakultas), [
                'kode' => 'FK99',
                'nama' => 'Nama Baru',
            ])
            ->assertStatus(403);
    }

    // -------------------------------------------------------
    // Destroy
    // -------------------------------------------------------

    public function test_super_admin_can_delete_fakultas(): void
    {
        $fakultas = Fakultas::factory()->create();

        $this->actingAs($this->superAdmin)
            ->delete(route('fakultas.destroy', $fakultas))
            ->assertRedirect(route('fakultas.index'));

        $this->assertDatabaseMissing('fakultas', ['id' => $fakultas->id]);
    }

    public function test_admin_fakultas_cannot_delete_fakultas(): void
    {
        $this->actingAs($this->adminFakultas)
            ->delete(route('fakultas.destroy', $this->fakultas))
            ->assertStatus(403);
    }

    public function test_admin_departemen_cannot_delete_fakultas(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->delete(route('fakultas.destroy', $this->fakultas))
            ->assertStatus(403);
    }

    // -------------------------------------------------------
    // Search
    // -------------------------------------------------------

    public function test_fakultas_list_can_be_searched_by_nama(): void
    {
        Fakultas::factory()->create(['nama' => 'Fakultas Teknik']);
        Fakultas::factory()->create(['nama' => 'Fakultas Ekonomi']);

        $response = $this->actingAs($this->superAdmin)
            ->get(route('fakultas.index', ['search' => 'Teknik']));

        $response->assertSee('Fakultas Teknik');
        $response->assertDontSee('Fakultas Ekonomi');
    }

    public function test_guest_is_redirected_from_fakultas_index(): void
    {
        $this->get(route('fakultas.index'))->assertRedirect('/login');
    }
}
