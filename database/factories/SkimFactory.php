<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skim>
 */
class SkimFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama'      => fake()->unique()->words(3, true),
            'deskripsi' => fake()->sentence(),
        ];
    }
}
