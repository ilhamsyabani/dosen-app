<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function fakultas(){
        return $this->belongsTo(Fakultas::class);
    }

    public function dosen(){
        return $this->hasMany(Dosen::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
