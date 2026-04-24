<?php

namespace Database\Factories;

use App\Models\Departemen;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'nama'          => fake()->name(),
            'nip'           => fake()->unique()->numerify('####################'),
            'email'         => fake()->unique()->safeEmail(),
            'password'      => static::$password ??= Hash::make('password'),
            'departemen_id' => Departemen::factory(),
        ];
    }
}
