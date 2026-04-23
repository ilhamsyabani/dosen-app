<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hakis', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('jenis');    // nilai: Haki, Paten
            $table->string('tingkat'); // nilai: Nasional, Internasional
            $table->string('produk');
            $table->string('judul');
            $table->date('tanggal_terbit');
            $table->string('url');
            $table->string('sertifikat')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hakis');
    }
};
