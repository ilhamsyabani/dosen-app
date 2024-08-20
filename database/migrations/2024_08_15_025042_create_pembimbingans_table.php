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
        Schema::create('pembimbingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('tahun_ajaran');
            $table->string('jenjang');
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->integer('banyaknya_bimbingan')->default(0);
            $table->enum('kegiatan', ['DPA', 'KKN/PK'])->default('DPA');
            $table->string('bukti_bimbingan_sk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembimbingans');
    }
};
