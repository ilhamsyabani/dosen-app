<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bahan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dosen() : BelongsTo {
        return $this->belongsTo(Dosen::class);
    }
}
