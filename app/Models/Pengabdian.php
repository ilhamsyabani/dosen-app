<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengabdian extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'tim_peneliti' => 'array',
        'mahasiswa' => 'array',
        'digunakan_di_masyarakat' => 'boolean',
        'berbasis_riset' => 'boolean',
    ];

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class);
    }

    public function skim(): BelongsTo
    {
        return $this->belongsTo(Skim::class);
    }
}
