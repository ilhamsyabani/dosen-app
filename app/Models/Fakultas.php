<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function departemen(){
        return $this->hasMany(Departemen::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
