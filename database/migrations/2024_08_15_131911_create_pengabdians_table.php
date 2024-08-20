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
        Schema::create('pengabdians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('judul');
            $table->string('hibah');
            $table->foreignId('skim_id')->constrained('skims');
            $table->year('tahun_usulan');
            $table->year('tahun_kegiatan');
            $table->year('tahun_pelaksanaan');
            $table->integer('lama_kegiatan');
            $table->decimal('dana_dikti', 15, 2);
            $table->decimal('dana_pt', 15, 2);
            $table->decimal('dana_institusi_lain', 15, 2);
            $table->string('posisi');
            $table->json('tim_peneliti')->nullable();
            $table->json('mahasiswa')->nullable();
            $table->boolean('berbasis_riset')->default(false);
            $table->boolean('digunakan_di_masyarakat')->default(false);
            $table->string('no_sk');
            $table->string('sk')->nullable();
            $table->string('laporan')->nullable();
            $table->string('sertifikat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengabdians');
    }
};
