<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('nip')->unique();
            $table->string('password')->nullable();   // opsional — fallback login selain Google OAuth
            $table->foreignId('departemen_id')->constrained('departemens')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
