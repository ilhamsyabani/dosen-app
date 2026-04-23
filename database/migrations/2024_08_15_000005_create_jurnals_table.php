<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('kategori');
            $table->string('penulis');
            $table->integer('penulis_ke');
            $table->string('posisi');           // nilai: Author, Co-Author
            $table->string('judul');
            $table->string('nama_jurnal');
            $table->string('jenis_jurnal');     // nilai: Penelitian, Pengabdian
            $table->date('tanggal');
            $table->integer('volume')->nullable();
            $table->string('halaman')->nullable();
            $table->string('edisi')->nullable();
            $table->string('doi_url')->nullable();
            $table->string('kategori_jurnal');  // nilai: Nasional, Internasional
            $table->string('terindeks');        // nilai: Terindeks, Tidak Terindeks
            $table->string('sinta')->nullable(); // nilai: Sinta 1-2, Sinta 3-4, Sinta 5-6
            $table->string('q')->nullable();     // nilai: Q1, Q2, Q3, Q4, Non-Q
            $table->string('issn')->nullable();
            $table->string('pelaksana')->nullable();
            $table->string('arikel')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurnals');
    }
};
