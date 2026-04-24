<?php

namespace Tests\Feature;

use App\Models\Departemen;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    // -------------------------------------------------------
    // Admin (guard 'web') Authentication
    // -------------------------------------------------------

    public function test_admin_login_page_accessible_for_guest(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->superAdmin()->create();

        $response = $this->post('/login', [
            'email'    => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/admin/home');
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_login_fails_with_wrong_password(): void
    {
        $user = User::factory()->superAdmin()->create();

        $response = $this->post('/login', [
            'email'    => $user->email,
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

    public function test_admin_login_fails_with_nonexistent_email(): void
    {
        $response = $this->post('/login', [
            'email'    => 'notexist@example.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }

    public function test_admin_can_logout(): void
    {
        $user = User::factory()->superAdmin()->create();

        $this->actingAs($user)
            ->post('/logout')
            ->assertRedirect('/');

        $this->assertGuest();
    }

    public function test_authenticated_admin_is_redirected_from_login_page(): void
    {
        $user = User::factory()->superAdmin()->create();

        $this->actingAs($user)
            ->get('/login')
            ->assertRedirect('/admin/home');
    }

    // -------------------------------------------------------
    // Dosen (guard 'dosen') Authentication
    // -------------------------------------------------------

    public function test_dosen_login_page_accessible_for_guest(): void
    {
        $response = $this->get('/dosen/login');

        $response->assertStatus(200);
    }

    public function test_dosen_can_login_with_valid_credentials(): void
    {
        $dosen = Dosen::factory()->create();

        $response = $this->post('/dosen/login', [
            'email'    => $dosen->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($dosen, 'dosen');
    }

    public function test_dosen_login_fails_with_wrong_password(): void
    {
        $dosen = Dosen::factory()->create();

        $response = $this->post('/dosen/login', [
            'email'    => $dosen->email,
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest('dosen');
    }

    public function test_dosen_login_fails_with_nonexistent_email(): void
    {
        $response = $this->post('/dosen/login', [
            'email'    => 'notexist@example.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest('dosen');
    }

    public function test_dosen_can_logout(): void
    {
        $dosen = Dosen::factory()->create();

        $this->actingAs($dosen, 'dosen')
            ->post('/dosen/logout')
            ->assertRedirect('/dosen/login');

        $this->assertGuest('dosen');
    }

    public function test_authenticated_dosen_is_redirected_from_dosen_login_page(): void
    {
        $dosen = Dosen::factory()->create();

        $this->actingAs($dosen, 'dosen')
            ->get('/dosen/login')
            ->assertRedirect('/dashboard');
    }

    // -------------------------------------------------------
    // Redirect Guards
    // -------------------------------------------------------

    public function test_unauthenticated_user_is_redirected_from_admin_routes(): void
    {
        $this->get('/admin/home')->assertRedirect('/login');
    }

    public function test_unauthenticated_dosen_is_redirected_from_dashboard_routes(): void
    {
        $this->get('/dashboard')->assertRedirect('/dosen/login');
    }

    public function test_forgot_password_page_uses_guest_layout(): void
    {
        $this->get(route('password.request'))->assertStatus(200);
    }

    public function test_login_validation_requires_email_and_password(): void
    {
        $response = $this->post('/login', []);

        $response->assertSessionHasErrors(['email', 'password']);
    }

    public function test_dosen_login_validation_requires_email_and_password(): void
    {
        $response = $this->post('/dosen/login', []);

        $response->assertSessionHasErrors(['email', 'password']);
    }
}
