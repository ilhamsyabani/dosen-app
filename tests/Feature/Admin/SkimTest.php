<?php

namespace Tests\Feature\Admin;

use App\Models\Departemen;
use App\Models\Fakultas;
use App\Models\Skim;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SkimTest extends TestCase
{
    use RefreshDatabase;

    private User $superAdmin;
    private User $adminFakultas;
    private User $adminDepartemen;

    protected function setUp(): void
    {
        parent::setUp();

        $fakultas              = Fakultas::factory()->create();
        $departemen            = Departemen::factory()->create(['fakultas_id' => $fakultas->id]);
        $this->superAdmin      = User::factory()->superAdmin()->create();
        $this->adminFakultas   = User::factory()->adminFakultas()->create(['fakultas_id' => $fakultas->id]);
        $this->adminDepartemen = User::factory()->adminDepartemen()->create([
            'fakultas_id'   => $fakultas->id,
            'departemen_id' => $departemen->id,
        ]);
    }

    // -------------------------------------------------------
    // Index (semua admin bisa akses)
    // -------------------------------------------------------

    public function test_super_admin_can_view_skim_list(): void
    {
        $this->actingAs($this->superAdmin)
            ->get(route('skim.index'))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_can_view_skim_list(): void
    {
        $this->actingAs($this->adminFakultas)
            ->get(route('skim.index'))
            ->assertStatus(200);
    }

    public function test_admin_departemen_can_view_skim_list(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->get(route('skim.index'))
            ->assertStatus(200);
    }

    // -------------------------------------------------------
    // Create
    // -------------------------------------------------------

    public function test_all_admin_roles_can_view_create_skim_form(): void
    {
        foreach ([$this->superAdmin, $this->adminFakultas, $this->adminDepartemen] as $user) {
            $this->actingAs($user)
                ->get(route('skim.create'))
                ->assertStatus(200);
        }
    }

    // -------------------------------------------------------
    // Store
    // -------------------------------------------------------

    public function test_super_admin_can_create_skim(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->post(route('skim.store'), [
                'nama'      => 'Skim Penelitian Dasar',
                'deskripsi' => 'Penelitian fundamental',
            ]);

        $response->assertRedirect(route('skim.create'));
        $this->assertDatabaseHas('skims', ['nama' => 'Skim Penelitian Dasar']);
    }

    public function test_admin_fakultas_can_create_skim(): void
    {
        $response = $this->actingAs($this->adminFakultas)
            ->post(route('skim.store'), [
                'nama'      => 'Skim Mandiri',
                'deskripsi' => 'Dana mandiri',
            ]);

        $response->assertRedirect(route('skim.create'));
        $this->assertDatabaseHas('skims', ['nama' => 'Skim Mandiri']);
    }

    public function test_admin_departemen_can_create_skim(): void
    {
        $response = $this->actingAs($this->adminDepartemen)
            ->post(route('skim.store'), [
                'nama'      => 'Skim Departemen',
                'deskripsi' => 'Dana departemen',
            ]);

        $response->assertRedirect(route('skim.create'));
        $this->assertDatabaseHas('skims', ['nama' => 'Skim Departemen']);
    }

    public function test_store_validates_required_fields(): void
    {
        $this->actingAs($this->superAdmin)
            ->post(route('skim.store'), [])
            ->assertSessionHasErrors(['nama', 'deskripsi']);
    }

    public function test_store_validates_nama_max_length(): void
    {
        $this->actingAs($this->superAdmin)
            ->post(route('skim.store'), [
                'nama'      => str_repeat('a', 256),
                'deskripsi' => 'Deskripsi valid',
            ])
            ->assertSessionHasErrors('nama');
    }

    // -------------------------------------------------------
    // Edit & Update
    // -------------------------------------------------------

    public function test_super_admin_can_view_edit_skim_form(): void
    {
        $skim = Skim::factory()->create();

        $this->actingAs($this->superAdmin)
            ->get(route('skim.edit', $skim))
            ->assertStatus(200);
    }

    public function test_super_admin_can_update_skim(): void
    {
        $skim = Skim::factory()->create();

        $response = $this->actingAs($this->superAdmin)
            ->put(route('skim.update', $skim), [
                'nama'      => 'Skim Diperbarui',
                'deskripsi' => 'Deskripsi baru',
            ]);

        $response->assertRedirect(route('skim.index'));
        $this->assertDatabaseHas('skims', ['id' => $skim->id, 'nama' => 'Skim Diperbarui']);
    }

    public function test_update_validates_required_fields(): void
    {
        $skim = Skim::factory()->create();

        $this->actingAs($this->superAdmin)
            ->put(route('skim.update', $skim), [])
            ->assertSessionHasErrors(['nama', 'deskripsi']);
    }

    // -------------------------------------------------------
    // Destroy
    // -------------------------------------------------------

    public function test_super_admin_can_delete_skim(): void
    {
        $skim = Skim::factory()->create();

        $this->actingAs($this->superAdmin)
            ->delete(route('skim.destroy', $skim))
            ->assertRedirect(route('skim.index'));

        $this->assertDatabaseMissing('skims', ['id' => $skim->id]);
    }

    public function test_admin_fakultas_can_delete_skim(): void
    {
        $skim = Skim::factory()->create();

        $this->actingAs($this->adminFakultas)
            ->delete(route('skim.destroy', $skim))
            ->assertRedirect(route('skim.index'));

        $this->assertDatabaseMissing('skims', ['id' => $skim->id]);
    }

    // -------------------------------------------------------
    // Search
    // -------------------------------------------------------

    public function test_skim_list_can_be_searched_by_nama(): void
    {
        Skim::factory()->create(['nama' => 'Penelitian Dasar']);
        Skim::factory()->create(['nama' => 'Pengabdian Masyarakat']);

        $response = $this->actingAs($this->superAdmin)
            ->get(route('skim.index', ['search' => 'Dasar']));

        $response->assertSee('Penelitian Dasar');
        $response->assertDontSee('Pengabdian Masyarakat');
    }

    public function test_guest_is_redirected_from_skim_index(): void
    {
        $this->get(route('skim.index'))->assertRedirect('/login');
    }
}
