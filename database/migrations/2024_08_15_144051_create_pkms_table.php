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
        Schema::create('pkms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('nama');
            $table->string('tingkat');
            $table->string('kategori_pembicara');
            $table->string('penyelenggara');
            $table->date('tanggal');
            $table->string('honorarium');
            $table->string('no_sk');
            $table->string('surat_tugas')->nullable();
            $table->string('materi')->nullable();
            $table->string('laporan')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('ia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkms');
    }
};
