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
        Schema::create('pengujians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->string('prodi');
            $table->string('jenjang');
            $table->string('sebagai');
            $table->string('undangan')->nullable();
            $table->string('sk_pengujian')->nullable();
            $table->string('lembar_pengesahan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengujians');
    }
};
