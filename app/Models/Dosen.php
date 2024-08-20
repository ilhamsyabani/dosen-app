<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Dosen extends Authenticatable
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'nama',
        'nip',
        'email',
        'departemen_id',
    ];

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(Detail::class);
    }

    public function jabatans(): HasOne
    {
        return $this->hasOne(Jabatan::class);
    }

    public function studis(): HasMany
    {
        return $this->hasMany(Studi::class);
    }

    public function kompetensis(): HasMany
    {
        return $this->hasMany(Kompetensi::class);
    }

    public function pengajarans(): HasMany
    {
        return $this->hasMany(Pengajaran::class);
    }

    public function bimbingans(): HasMany
    {
        return $this->hasMany(Bimbingan::class);
    }

    public function pengujians(): HasMany
    {
        return $this->hasMany(Pengujian::class);
    }

    public function bahans(): HasMany
    {
        return $this->hasMany(Bahan::class);
    }

    public function pembinaans(): HasMany
    {
        return $this->hasMany(Pembinaan::class);
    }

    public function pembimbingans(): HasMany
    {
        return $this->hasMany(Pembimbingan::class);
    }

    public function kunjungans(): HasMany
    {
        return $this->hasMany(Kunjungan::class);
    }

    public function eksternals(): HasMany
    {
        return $this->hasMany(Eksternal::class);
    }

    public function penelitians(): HasMany
    {
        return $this->hasMany(Penelitian::class);
    }

    public function jurnals(): HasMany
    {
        return $this->hasMany(Jurnal::class);
    }

    public function publikasis(): HasMany
    {
        return $this->hasMany(publikasi::class);
    }

    public function bukus(): HasMany
    {
        return $this->hasMany(Buku::class);
    }

    public function hakis(): HasMany
    {
        return $this->hasMany(Haki::class);
    }

    public function pengabdians(): HasMany
    {
        return $this->hasMany(Pengabdian::class);
    }

    public function pkms(): HasMany
    {
        return $this->hasMany(Pkm::class);
    }

    public function pengelolas(): HasMany
    {
        return $this->hasMany(Pengelola::class);
    }

    public function profesi(): HasMany
    {
        return $this->hasMany(Profesi::class);
    }

    public function penghargaan(): HasMany
    {
        return $this->hasMany(Penghargaan::class);
    }

    public function penunjang(): HasMany
    {
        return $this->hasMany(Penunjang::class);
    }

    public function delegasi(): HasMany
    {
        return $this->hasMany(Delegasi::class);
    }

    public function pertemuan(): HasMany
    {
        return $this->hasMany(Pertemuan::class);
    }
}
