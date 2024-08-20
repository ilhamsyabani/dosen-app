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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('alamat', 255);
            $table->string('phone', 32);
            $table->string('foto', 2048)->nullable();
            $table->string('sinta_id', 20)->nullable();
            $table->string('scopus_id', 20)->nullable();
            $table->string('orchid_id', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
