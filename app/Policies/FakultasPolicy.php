<?php

namespace App\Policies;

use App\Models\Fakultas;
use App\Models\User;

class FakultasPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Semua admin bisa melihat daftar fakultas
    }

    public function view(User $user, Fakultas $fakultas): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isSuperAdmin();
    }

    public function update(User $user, Fakultas $fakultas): bool
    {
        return $user->isSuperAdmin();
    }

    public function delete(User $user, Fakultas $fakultas): bool
    {
        return $user->isSuperAdmin();
    }
}
