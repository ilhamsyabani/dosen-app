<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
