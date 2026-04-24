<?php

namespace Database\Factories;

use App\Models\Fakultas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departemen>
 */
class DepartemenFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode'        => fake()->unique()->lexify('DP??'),
            'nama'        => fake()->unique()->company(),
            'deskripsi'   => fake()->sentence(),
            'fakultas_id' => Fakultas::factory(),
        ];
    }
}
