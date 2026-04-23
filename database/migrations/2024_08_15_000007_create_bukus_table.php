<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('jenis');
            $table->string('penulis');
            $table->integer('penulis_ke');
            $table->string('posisi');   // nilai: Author, Coauthor
            $table->string('judul');
            $table->string('tahun', 4);
            $table->string('penerbit');
            $table->string('kota');
            $table->string('isbn');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
