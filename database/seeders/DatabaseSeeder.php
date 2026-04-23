<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), 
            'role' => 'admin', // <-- Tambahkan ini jika Anda punya kolom 'role'
        ]);

        // 2. Buat User Biasa yang Spesifik
        User::factory()->create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user', 
        ]);
        User::factory(10)->create();
    }
}
