<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skim extends Model
{
    use HasFactory;

    protected $guarded=[];

     public function penelitian(): HasMany
    {
        return $this->hasMany(Penelitian::class);
    }

     public function pengabdian(): HasMany
    {
        return $this->hasMany(Pengabdian::class);
    }
}
