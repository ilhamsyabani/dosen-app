<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isSuperAdmin() || $user->isAdminFakultas();
    }

    public function view(User $user, User $model): bool
    {
        if ($user->isSuperAdmin()) return true;
        if ($user->isAdminFakultas()) return $model->fakultas_id == $user->fakultas_id;
        return false;
    }

    public function create(User $user): bool
    {
        return $user->isSuperAdmin() || $user->isAdminFakultas();
    }

    public function update(User $user, User $model): bool
    {
        if ($user->isSuperAdmin()) return true;
        if ($user->isAdminFakultas()) {
            return $model->fakultas_id == $user->fakultas_id
                && $model->role === User::ROLE_ADMIN_DEPARTEMEN;
        }
        return false;
    }

    public function delete(User $user, User $model): bool
    {
        if ($user->isSuperAdmin()) return $model->role !== User::ROLE_SUPER_ADMIN;
        if ($user->isAdminFakultas()) {
            return $model->fakultas_id == $user->fakultas_id
                && $model->role === User::ROLE_ADMIN_DEPARTEMEN;
        }
        return false;
    }
}
