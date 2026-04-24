<?php

namespace Tests\Feature\Admin;

use App\Models\Departemen;
use App\Models\Fakultas;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
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

    public function test_super_admin_can_view_all_users(): void
    {
        $this->actingAs($this->superAdmin)
            ->get(route('user.index'))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_can_view_user_list(): void
    {
        $this->actingAs($this->adminFakultas)
            ->get(route('user.index'))
            ->assertStatus(200);
    }

    public function test_admin_departemen_cannot_view_user_list(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->get(route('user.index'))
            ->assertStatus(403);
    }

    public function test_admin_fakultas_only_sees_users_from_their_faculty(): void
    {
        $otherFakultas = Fakultas::factory()->create();
        $userOtherFaculty = User::factory()->adminDepartemen()->create([
            'fakultas_id' => $otherFakultas->id,
        ]);

        $response = $this->actingAs($this->adminFakultas)
            ->get(route('user.index'));

        $response->assertStatus(200);
        $response->assertDontSee($userOtherFaculty->name);
    }

    // -------------------------------------------------------
    // Create
    // -------------------------------------------------------

    public function test_super_admin_can_view_create_user_form(): void
    {
        $this->actingAs($this->superAdmin)
            ->get(route('user.create'))
            ->assertStatus(200);
    }

    public function test_admin_fakultas_can_view_create_user_form(): void
    {
        $this->actingAs($this->adminFakultas)
            ->get(route('user.create'))
            ->assertStatus(200);
    }

    public function test_admin_departemen_cannot_view_create_user_form(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->get(route('user.create'))
            ->assertStatus(403);
    }

    // -------------------------------------------------------
    // Store
    // -------------------------------------------------------

    public function test_super_admin_can_create_user(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->post(route('user.store'), [
                'name'     => 'User Baru',
                'email'    => 'userbaru@example.com',
                'password' => 'password123',
                'role'     => User::ROLE_ADMIN_DEPARTEMEN,
            ]);

        $response->assertRedirect(route('user.index'));
        $this->assertDatabaseHas('users', ['email' => 'userbaru@example.com']);
    }

    public function test_admin_fakultas_can_only_create_admin_departemen(): void
    {
        $response = $this->actingAs($this->adminFakultas)
            ->post(route('user.store'), [
                'name'     => 'Admin Depart Baru',
                'email'    => 'admindepart@example.com',
                'password' => 'password123',
                'role'     => User::ROLE_SUPER_ADMIN, // akan di-override jadi Admin Departemen
            ]);

        $response->assertRedirect(route('user.index'));
        $this->assertDatabaseHas('users', [
            'email' => 'admindepart@example.com',
            'role'  => User::ROLE_ADMIN_DEPARTEMEN,
        ]);
    }

    public function test_admin_departemen_cannot_create_user(): void
    {
        $this->actingAs($this->adminDepartemen)
            ->post(route('user.store'), [
                'name'     => 'User Baru',
                'email'    => 'userbaru@example.com',
                'password' => 'password123',
                'role'     => User::ROLE_ADMIN_DEPARTEMEN,
            ])
            ->assertStatus(403);
    }

    public function test_store_validates_required_fields(): void
    {
        $this->actingAs($this->superAdmin)
            ->post(route('user.store'), [])
            ->assertSessionHasErrors(['name', 'email', 'password', 'role']);
    }

    public function test_store_validates_unique_email(): void
    {
        $this->actingAs($this->superAdmin)
            ->post(route('user.store'), [
                'name'     => 'Duplikat',
                'email'    => $this->superAdmin->email,
                'password' => 'password123',
                'role'     => User::ROLE_ADMIN_DEPARTEMEN,
            ])
            ->assertSessionHasErrors('email');
    }

    // -------------------------------------------------------
    // Edit & Update
    // -------------------------------------------------------

    public function test_super_admin_can_view_edit_user_form(): void
    {
        $user = User::factory()->adminDepartemen()->create([
            'fakultas_id' => $this->fakultas->id,
        ]);

        $this->actingAs($this->superAdmin)
            ->get(route('user.edit', $user))
            ->assertStatus(200);
    }

    public function test_super_admin_can_update_user(): void
    {
        $user = User::factory()->adminDepartemen()->create([
            'fakultas_id' => $this->fakultas->id,
        ]);

        $response = $this->actingAs($this->superAdmin)
            ->put(route('user.update', $user), [
                'name'  => 'Nama Diperbarui',
                'email' => $user->email,
                'role'  => User::ROLE_ADMIN_DEPARTEMEN,
            ]);

        $response->assertRedirect(route('user.index'));
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'Nama Diperbarui']);
    }

    public function test_update_validates_required_fields(): void
    {
        $user = User::factory()->adminDepartemen()->create();

        $this->actingAs($this->superAdmin)
            ->put(route('user.update', $user), [])
            ->assertSessionHasErrors(['name', 'email', 'role']);
    }

    // -------------------------------------------------------
    // Destroy
    // -------------------------------------------------------

    public function test_super_admin_can_delete_user(): void
    {
        $user = User::factory()->adminDepartemen()->create([
            'fakultas_id' => $this->fakultas->id,
        ]);

        $this->actingAs($this->superAdmin)
            ->delete(route('user.destroy', $user))
            ->assertRedirect(route('user.index'));

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_admin_departemen_cannot_delete_user(): void
    {
        $user = User::factory()->adminDepartemen()->create();

        $this->actingAs($this->adminDepartemen)
            ->delete(route('user.destroy', $user))
            ->assertStatus(403);
    }

    // -------------------------------------------------------
    // Search & Sort
    // -------------------------------------------------------

    public function test_user_list_can_be_searched_by_name(): void
    {
        User::factory()->superAdmin()->create(['name' => 'Andi Setiawan']);
        User::factory()->superAdmin()->create(['name' => 'Budi Hartono']);

        $response = $this->actingAs($this->superAdmin)
            ->get(route('user.index', ['search' => 'Andi']));

        $response->assertStatus(200);
        $response->assertSee('Andi Setiawan');
        $response->assertDontSee('Budi Hartono');
    }

    public function test_guest_is_redirected_from_user_index(): void
    {
        $this->get(route('user.index'))->assertRedirect('/login');
    }
}
