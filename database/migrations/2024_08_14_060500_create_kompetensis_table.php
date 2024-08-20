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
        Schema::create('kompetensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('nama_kompetensi');
            $table->string('no_sertifikat')->nullable();
            $table->string('tahun_sertifikat', 4)->nullable();
            $table->string('institusi_sertifikat')->nullable();
            $table->string('bidang_kompetensi')->nullable();
            $table->string('jam_pelajaran')->nullable();
            $table->string('jenis_diklat')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('sk_penugasan')->nullable();
            $table->string('sertifikat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kompetensis');
    }
};
