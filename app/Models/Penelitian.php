<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosen_id',
        'judul',
        'hibah',
        'skim_id',
        'tahun_usulan',
        'tahun_kegiatan',
        'tahun_pelaksanaan',
        'lama_kegiatan',
        'dana_dikti',
        'dana_pt',
        'dana_institusi_lain',
        'posisi',
        'tim_peneliti',
        'mahasiswa',
        'digunakan_di_masyarakat',
        'no_sk',
        'sk_penugasan',
        'laporan',
        'kontrak_penelitian',
    ];

    protected $casts = [
        'tim_peneliti' => 'array',
        'mahasiswa' => 'array',
        'digunakan_di_masyarakat' => 'boolean',
    ];

    public function skim()
    {
        return $this->belongsTo(Skim::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
