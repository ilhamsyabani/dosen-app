<?php

namespace Tests\Feature\Admin;

use App\Models\Departemen;
use App\Models\Fakultas;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DepartemenTest extends TestCase
{
    use RefreshDatabase;

    private User $superAdmin;
    private User $adminFakultas;
    private User $adminDepartemen;
    private Fakultas $fakultas;
    private Departemen $departemen;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fakultas        = Fakultas::factory()->create();
        $this->departemen      = Departemen::factory()->create(['fakultas_id' => $this->fakultas->id]);
        $this->superAdmin      = User::factory()->superAdmin()->create();
        $this->adminFakultas   = User::factory()->adminFakultas()->create(['fakultas_id' => $this->fakultas->id]);
        $this->adminDepartemen = User::factory()->adminDepartemen()->create([
            'fakultas_id'   => $this->fakultas->id,
            'departemen_id' => $this->departemen->id,
        ]);
    }

    // -------------------------------------------------------
    // Index (semua admin bisa lihat, tapi scope berbeda)
    // -------------------------------------------------------

    public function test_super_admin_can_view_departemen_list(): void
    {
        $this->actingAs($this->superAdmin)
            ->get(route('departemen.index'))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_can_view_departemen_list(): void
    {
        $this->actingAs($this->adminFakultas)
            ->get(route('departemen.index'))
            ->assertStatus(200);
    }

    public function test_admin_departemen_can_view_departemen_list(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->get(route('departemen.index'))
            ->assertStatus(200);
    }

    // -------------------------------------------------------
    // Create (SuperAdmin dan AdminFakultas)
    // -------------------------------------------------------

    public function test_super_admin_can_view_create_departemen_form(): void
    {
        $this->actingAs($this->superAdmin)
            ->get(route('departemen.create'))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_can_view_create_departemen_form(): void
    {
        $this->actingAs($this->adminFakultas)
            ->get(route('departemen.create'))
            ->assertStatus(200);
    }

    public function test_admin_departemen_cannot_create_departemen(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->get(route('departemen.create'))
            ->assertStatus(403);
    }

    // -------------------------------------------------------
    // Store
    // -------------------------------------------------------

    public function test_super_admin_can_create_departemen(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->post(route('departemen.store'), [
                'kode'        => 'DP01',
                'nama'        => 'Teknik Informatika',
                'deskripsi'   => 'Program studi TI',
                'fakultas_id' => $this->fakultas->id,
            ]);

        $response->assertRedirect(route('departemen.create'));
        $this->assertDatabaseHas('departemens', ['kode' => 'DP01', 'nama' => 'Teknik Informatika']);
    }

    public function test_admin_fakultas_can_create_departemen(): void
    {
        $response = $this->actingAs($this->adminFakultas)
            ->post(route('departemen.store'), [
                'kode'        => 'DP02',
                'nama'        => 'Sistem Informasi',
                'deskripsi'   => 'Program studi SI',
                'fakultas_id' => $this->fakultas->id,
            ]);

        $response->assertRedirect(route('departemen.create'));
        $this->assertDatabaseHas('departemens', ['nama' => 'Sistem Informasi']);
    }

    public function test_admin_departemen_cannot_store_departemen(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->post(route('departemen.store'), [
                'kode'        => 'DP03',
                'nama'        => 'Departemen Baru',
                'fakultas_id' => $this->fakultas->id,
            ])
            ->assertStatus(403);
    }

    public function test_store_validates_required_fields(): void
    {
        $this->actingAs($this->superAdmin)
            ->post(route('departemen.store'), [])
            ->assertSessionHasErrors(['kode', 'nama']);
    }

    // -------------------------------------------------------
    // Edit & Update
    // -------------------------------------------------------

    public function test_super_admin_can_view_edit_departemen_form(): void
    {
        $this->actingAs($this->superAdmin)
            ->get(route('departemen.edit', $this->departemen))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_can_edit_departemen_in_their_faculty(): void
    {
        $this->actingAs($this->adminFakultas)
            ->get(route('departemen.edit', $this->departemen))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_cannot_edit_departemen_in_other_faculty(): void
    {
        $otherFakultas   = Fakultas::factory()->create();
        $otherDepartemen = Departemen::factory()->create(['fakultas_id' => $otherFakultas->id]);

        $this->actingAs($this->adminFakultas)
            ->get(route('departemen.edit', $otherDepartemen))
            ->assertStatus(403);
    }

    public function test_super_admin_can_update_departemen(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->put(route('departemen.update', $this->departemen), [
                'kode'        => 'DP99',
                'nama'        => 'Nama Baru',
                'fakultas_id' => $this->fakultas->id,
            ]);

        $response->assertRedirect(route('departemen.index'));
        $this->assertDatabaseHas('departemens', ['id' => $this->departemen->id, 'nama' => 'Nama Baru']);
    }

    public function test_admin_departemen_cannot_update_departemen(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->put(route('departemen.update', $this->departemen), [
                'kode'        => 'DP99',
                'nama'        => 'Nama Baru',
                'fakultas_id' => $this->fakultas->id,
            ])
            ->assertStatus(403);
    }

    // -------------------------------------------------------
    // Destroy (hanya SuperAdmin)
    // -------------------------------------------------------

    public function test_super_admin_can_delete_departemen(): void
    {
        $departemen = Departemen::factory()->create(['fakultas_id' => $this->fakultas->id]);

        $this->actingAs($this->superAdmin)
            ->delete(route('departemen.destroy', $departemen))
            ->assertRedirect(route('departemen.index'));

        $this->assertDatabaseMissing('departemens', ['id' => $departemen->id]);
    }

    public function test_admin_fakultas_cannot_delete_departemen(): void
    {
        $this->actingAs($this->adminFakultas)
            ->delete(route('departemen.destroy', $this->departemen))
            ->assertStatus(403);
    }

    public function test_admin_departemen_cannot_delete_departemen(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->delete(route('departemen.destroy', $this->departemen))
            ->assertStatus(403);
    }

    public function test_guest_is_redirected_from_departemen_index(): void
    {
        $this->get(route('departemen.index'))->assertRedirect('/login');
    }
}
