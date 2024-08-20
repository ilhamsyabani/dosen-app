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
        Schema::create('bimbingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('tahun_ajaran');
            $table->string('jenjang');
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->string('prodi');
            $table->string('frekuiensi');
            $table->string('peran');
            $table->string('buku_bimbingan')->nullable();
            $table->string('sk_pembimbing')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingans');
    }
};
