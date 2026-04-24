<?php

namespace Tests\Feature\Dosen;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    // -------------------------------------------------------
    // Akses Dashboard
    // -------------------------------------------------------

    public function test_authenticated_dosen_can_access_dashboard(): void
    {
        $dosen = Dosen::factory()->create();

        $this->actingAs($dosen, 'dosen')
            ->get('/dashboard')
            ->assertStatus(200);
    }

    public function test_guest_is_redirected_from_dashboard(): void
    {
        $this->get('/dashboard')->assertRedirect('/dosen/login');
    }

    public function test_admin_user_cannot_access_dosen_dashboard(): void
    {
        // Admin (guard web) tidak bisa akses route guard 'dosen'
        $user = User::factory()->superAdmin()->create();

        $this->actingAs($user)
            ->get('/dashboard')
            ->assertRedirect('/dosen/login');
    }

    // -------------------------------------------------------
    // Proteksi semua route dosen dashboard
    // -------------------------------------------------------

    public function test_all_dosen_routes_require_dosen_auth(): void
    {
        $routes = [
            '/dashboard/detail',
            '/dashboard/jabatan',
            '/dashboard/studi',
            '/dashboard/kompetensi',
            '/dashboard/pengajaran',
            '/dashboard/bimbingan',
            '/dashboard/pengujian',
            '/dashboard/bahan',
            '/dashboard/pembinaan',
            '/dashboard/pembimbingan',
            '/dashboard/kunjungan',
            '/dashboard/eksternal',
            '/dashboard/penelitian',
            '/dashboard/jurnal',
            '/dashboard/publikasi',
            '/dashboard/buku',
            '/dashboard/haki',
            '/dashboard/pengabdian',
            '/dashboard/pkm',
            '/dashboard/pengelola',
            '/dashboard/profesi',
            '/dashboard/penghargaan',
            '/dashboard/penunjang',
            '/dashboard/delegasi',
            '/dashboard/pertemuan',
        ];

        foreach ($routes as $route) {
            $this->get($route)->assertRedirect('/dosen/login');
        }
    }
}
