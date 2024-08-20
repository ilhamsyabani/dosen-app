<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('nama_matkul');
            $table->string('tahun_ajaran');
            $table->string('semester');
            $table->string('sks');
            $table->string('jenjang');
            $table->string('prodi');
            $table->string('bentuk');
            $table->string('rpp');
            $table->string('presensi')->nullable();
            $table->string('daftar_nilai')->nullable();
            $table->string('sk_mengajar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajarans');
    }
};
