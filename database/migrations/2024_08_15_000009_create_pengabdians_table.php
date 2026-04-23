<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengabdians', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('judul');
            $table->string('hibah');
            $table->foreignId('skim_id')->constrained('skims')->onDelete('restrict');
            $table->unsignedSmallInteger('tahun_usulan');      // pakai smallInteger agar kompatibel semua DB
            $table->unsignedSmallInteger('tahun_kegiatan');
            $table->unsignedSmallInteger('tahun_pelaksanaan');
            $table->integer('lama_kegiatan');
            $table->decimal('dana_dikti', 15, 2)->default(0);
            $table->decimal('dana_pt', 15, 2)->default(0);
            $table->decimal('dana_institusi_lain', 15, 2)->default(0);
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

    public function down(): void
    {
        Schema::dropIfExists('pengabdians');
    }
};
