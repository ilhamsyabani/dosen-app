<?php

namespace Tests\Feature\Admin;

use App\Models\Departemen;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DosenTest extends TestCase
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

        $this->fakultas       = Fakultas::factory()->create();
        $this->departemen     = Departemen::factory()->create(['fakultas_id' => $this->fakultas->id]);
        $this->superAdmin     = User::factory()->superAdmin()->create();
        $this->adminFakultas  = User::factory()->adminFakultas()->create([
            'fakultas_id' => $this->fakultas->id,
        ]);
        $this->adminDepartemen = User::factory()->adminDepartemen()->create([
            'fakultas_id'   => $this->fakultas->id,
            'departemen_id' => $this->departemen->id,
        ]);
    }

    // -------------------------------------------------------
    // Index
    // -------------------------------------------------------

    public function test_super_admin_can_view_all_dosens(): void
    {
        $this->actingAs($this->superAdmin)
            ->get(route('dosen.index'))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_can_view_dosen_list(): void
    {
        $this->actingAs($this->adminFakultas)
            ->get(route('dosen.index'))
            ->assertStatus(200);
    }

    public function test_admin_departemen_can_view_dosen_list(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->get(route('dosen.index'))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_only_sees_dosens_from_their_faculty(): void
    {
        $otherFakultas   = Fakultas::factory()->create();
        $otherDepartemen = Departemen::factory()->create(['fakultas_id' => $otherFakultas->id]);
        $dosenInFakultas = Dosen::factory()->create(['departemen_id' => $this->departemen->id]);
        $dosenOther      = Dosen::factory()->create(['departemen_id' => $otherDepartemen->id]);

        $response = $this->actingAs($this->adminFakultas)
            ->get(route('dosen.index'));

        $response->assertStatus(200);
        $response->assertSee($dosenInFakultas->nama);
        $response->assertDontSee($dosenOther->nama);
    }

    public function test_admin_departemen_only_sees_dosens_from_their_department(): void
    {
        $otherDepartemen = Departemen::factory()->create(['fakultas_id' => $this->fakultas->id]);
        $dosenInDepart   = Dosen::factory()->create(['departemen_id' => $this->departemen->id]);
        $dosenOther      = Dosen::factory()->create(['departemen_id' => $otherDepartemen->id]);

        $response = $this->actingAs($this->adminDepartemen)
            ->get(route('dosen.index'));

        $response->assertStatus(200);
        $response->assertSee($dosenInDepart->nama);
        $response->assertDontSee($dosenOther->nama);
    }

    // -------------------------------------------------------
    // Create
    // -------------------------------------------------------

    public function test_super_admin_can_view_create_dosen_form(): void
    {
        $this->actingAs($this->superAdmin)
            ->get(route('dosen.create'))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_can_view_create_dosen_form(): void
    {
        $this->actingAs($this->adminFakultas)
            ->get(route('dosen.create'))
            ->assertStatus(200);
    }

    public function test_admin_departemen_cannot_view_create_dosen_form(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->get(route('dosen.create'))
            ->assertStatus(403);
    }

    // -------------------------------------------------------
    // Store
    // -------------------------------------------------------

    public function test_super_admin_can_create_dosen(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->post(route('dosen.store'), [
                'nama'          => 'Dosen Baru',
                'nip'           => '12345678901234567890',
                'email'         => 'dosenbaru@example.com',
                'departemen_id' => $this->departemen->id,
            ]);

        $response->assertRedirect(route('dosen.create'));
        $this->assertDatabaseHas('dosens', ['email' => 'dosenbaru@example.com']);
    }

    public function test_admin_fakultas_can_create_dosen(): void
    {
        $response = $this->actingAs($this->adminFakultas)
            ->post(route('dosen.store'), [
                'nama'          => 'Dosen Fakultas Baru',
                'nip'           => '09876543210987654321',
                'email'         => 'dosenfakultas@example.com',
                'departemen_id' => $this->departemen->id,
            ]);

        $response->assertRedirect(route('dosen.create'));
        $this->assertDatabaseHas('dosens', ['email' => 'dosenfakultas@example.com']);
    }

    public function test_admin_departemen_cannot_create_dosen(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->post(route('dosen.store'), [
                'nama'          => 'Dosen Baru',
                'nip'           => '12345678901234567890',
                'email'         => 'dosenbaru@example.com',
                'departemen_id' => $this->departemen->id,
            ])
            ->assertStatus(403);
    }

    public function test_store_validates_required_fields(): void
    {
        $this->actingAs($this->superAdmin)
            ->post(route('dosen.store'), [])
            ->assertSessionHasErrors(['nama', 'nip', 'email', 'departemen_id']);
    }

    public function test_store_validates_unique_nip(): void
    {
        $existing = Dosen::factory()->create();

        $this->actingAs($this->superAdmin)
            ->post(route('dosen.store'), [
                'nama'          => 'Dosen Baru',
                'nip'           => $existing->nip,
                'email'         => 'unique@example.com',
                'departemen_id' => $this->departemen->id,
            ])
            ->assertSessionHasErrors('nip');
    }

    public function test_store_validates_unique_email(): void
    {
        $existing = Dosen::factory()->create();

        $this->actingAs($this->superAdmin)
            ->post(route('dosen.store'), [
                'nama'          => 'Dosen Baru',
                'nip'           => '11111111111111111111',
                'email'         => $existing->email,
                'departemen_id' => $this->departemen->id,
            ])
            ->assertSessionHasErrors('email');
    }

    // -------------------------------------------------------
    // Show
    // -------------------------------------------------------

    public function test_super_admin_can_view_dosen_detail(): void
    {
        $dosen = Dosen::factory()->create(['departemen_id' => $this->departemen->id]);

        $this->actingAs($this->superAdmin)
            ->get(route('dosen.show', $dosen))
            ->assertStatus(200);
    }

    public function test_admin_departemen_can_view_dosen_in_their_department(): void
    {
        $dosen = Dosen::factory()->create(['departemen_id' => $this->departemen->id]);

        $this->actingAs($this->adminDepartemen)
            ->get(route('dosen.show', $dosen))
            ->assertStatus(200);
    }

    // -------------------------------------------------------
    // Edit & Update
    // -------------------------------------------------------

    public function test_super_admin_can_update_dosen(): void
    {
        $dosen = Dosen::factory()->create(['departemen_id' => $this->departemen->id]);

        $response = $this->actingAs($this->superAdmin)
            ->put(route('dosen.update', $dosen), [
                'nama'          => 'Nama Diperbarui',
                'nip'           => $dosen->nip,
                'email'         => $dosen->email,
                'departemen_id' => $this->departemen->id,
            ]);

        $response->assertRedirect(route('dosen.index'));
        $this->assertDatabaseHas('dosens', ['id' => $dosen->id, 'nama' => 'Nama Diperbarui']);
    }

    public function test_update_validates_unique_nip_ignores_current_dosen(): void
    {
        $dosen = Dosen::factory()->create(['departemen_id' => $this->departemen->id]);

        // Update dengan NIP yang sama (tidak boleh gagal karena milik dosen ini sendiri)
        $response = $this->actingAs($this->superAdmin)
            ->put(route('dosen.update', $dosen), [
                'nama'          => 'Nama Baru',
                'nip'           => $dosen->nip,
                'email'         => $dosen->email,
                'departemen_id' => $this->departemen->id,
            ]);

        $response->assertRedirect(route('dosen.index'));
    }

    // -------------------------------------------------------
    // Destroy
    // -------------------------------------------------------

    public function test_super_admin_can_delete_dosen(): void
    {
        $dosen = Dosen::factory()->create(['departemen_id' => $this->departemen->id]);

        $this->actingAs($this->superAdmin)
            ->delete(route('dosen.destroy', $dosen))
            ->assertRedirect(route('dosen.index'));

        $this->assertDatabaseMissing('dosens', ['id' => $dosen->id]);
    }

    public function test_admin_departemen_cannot_delete_dosen(): void
    {
        $dosen = Dosen::factory()->create(['departemen_id' => $this->departemen->id]);

        $this->actingAs($this->adminDepartemen)
            ->delete(route('dosen.destroy', $dosen))
            ->assertStatus(403);
    }

    // -------------------------------------------------------
    // Search
    // -------------------------------------------------------

    public function test_dosen_list_can_be_searched_by_nama(): void
    {
        Dosen::factory()->create(['nama' => 'Dr. Andi Susanto', 'departemen_id' => $this->departemen->id]);
        Dosen::factory()->create(['nama' => 'Prof. Budi Hartono', 'departemen_id' => $this->departemen->id]);

        $response = $this->actingAs($this->superAdmin)
            ->get(route('dosen.index', ['search' => 'Andi']));

        $response->assertSee('Dr. Andi Susanto');
        $response->assertDontSee('Prof. Budi Hartono');
    }

    public function test_guest_is_redirected_from_dosen_index(): void
    {
        $this->get(route('dosen.index'))->assertRedirect('/login');
    }
}
