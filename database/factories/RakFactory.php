<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RakFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode_rak' => 'R' . $this->faker->unique()->numberBetween(1, 100),
            'lokasi'   => 'Lantai ' . $this->faker->numberBetween(1, 3),
        ];
    }
}
