<?php

namespace App\Policies;

use App\Models\Dosen;
use App\Models\User;

class DosenPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Semua admin bisa lihat daftar (query di-scope di controller)
    }

    public function view(User $user, Dosen $dosen): bool
    {
        return match($user->role) {
            User::ROLE_SUPER_ADMIN    => true,
            User::ROLE_ADMIN_FAKULTAS => $dosen->departemen?->fakultas_id == $user->fakultas_id,
            User::ROLE_ADMIN_DEPARTEMEN => $dosen->departemen_id == $user->departemen_id,
            default => false,
        };
    }

    public function create(User $user): bool
    {
        return $user->isSuperAdmin() || $user->isAdminFakultas();
    }

    public function update(User $user, Dosen $dosen): bool
    {
        return match($user->role) {
            User::ROLE_SUPER_ADMIN    => true,
            User::ROLE_ADMIN_FAKULTAS => $dosen->departemen?->fakultas_id == $user->fakultas_id,
            User::ROLE_ADMIN_DEPARTEMEN => $dosen->departemen_id == $user->departemen_id,
            default => false,
        };
    }

    public function delete(User $user, Dosen $dosen): bool
    {
        return match($user->role) {
            User::ROLE_SUPER_ADMIN    => true,
            User::ROLE_ADMIN_FAKULTAS => $dosen->departemen?->fakultas_id == $user->fakultas_id,
            default => false,
        };
    }
}
