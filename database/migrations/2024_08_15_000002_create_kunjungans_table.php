<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('jenjang');
            $table->string('universitas');
            $table->string('prodi');
            $table->string('matkul');
            $table->string('undangan')->nullable();
            $table->string('surat_tugas')->nullable();
            $table->string('ia')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
