<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ROLE_SUPER_ADMIN      = 'admin';
    const ROLE_ADMIN_FAKULTAS   = 'Admin Fakultas';
    const ROLE_ADMIN_DEPARTEMEN = 'Admin Departemen';

    public function isSuperAdmin(): bool
    {
        return $this->role === self::ROLE_SUPER_ADMIN;
    }

    public function isAdminFakultas(): bool
    {
        return $this->role === self::ROLE_ADMIN_FAKULTAS;
    }

    public function isAdminDepartemen(): bool
    {
        return $this->role === self::ROLE_ADMIN_DEPARTEMEN;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'fakultas_id',
        'departemen_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function fakultas(){
        return $this->belongsTo(Fakultas::class);
    }

    public function departemen(){
        return $this->belongsTo(Departemen::class);
    }
}
