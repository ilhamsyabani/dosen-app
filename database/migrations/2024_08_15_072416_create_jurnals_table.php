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
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('kategori');
            $table->string('penulis');
            $table->integer('penulis_ke');
            $table->enum('posisi', ['Author', 'Co-Author']);
            $table->string('judul');
            $table->string('nama_jurnal');
            $table->enum('jenis_jurnal', ['Penelitian', 'Pengabdian']);
            $table->date('tanggal');
            $table->integer('volume')->nullable();
            $table->string('halaman')->nullable();
            $table->string('edisi')->nullable();
            $table->string('doi_url')->nullable();
            $table->enum('kategori_jurnal', ['Nasional', 'Internasional']);
            $table->enum('terindeks', ['Terindeks', 'Tidak Terindeks']);
            $table->enum('sinta', ['Sinta 1-2', 'Sinta 3-4', 'Sinta 5-6'])->nullable();
            $table->enum('q', ['Q1', 'Q2', 'Q3', 'Q4', 'Non-Q'])->nullable();
            $table->string('issn')->nullable();
            $table->string('pelaksana')->nullable();
            $table->string('arikel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnals');
    }
};
