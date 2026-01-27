<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FacilityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'photo' => fake()->word(),
        ];
    }
}
