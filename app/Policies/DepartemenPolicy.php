<?php

namespace App\Policies;

use App\Models\Departemen;
use App\Models\User;

class DepartemenPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Semua admin bisa melihat daftar (query di-scope di controller)
    }

    public function view(User $user, Departemen $departemen): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isSuperAdmin() || $user->isAdminFakultas();
    }

    public function update(User $user, Departemen $departemen): bool
    {
        if ($user->isSuperAdmin()) return true;
        if ($user->isAdminFakultas()) return $departemen->fakultas_id == $user->fakultas_id;
        return false;
    }

    public function delete(User $user, Departemen $departemen): bool
    {
        return $user->isSuperAdmin();
    }
}
