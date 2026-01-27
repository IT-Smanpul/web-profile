<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AchievementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'category' => fake()->randomElement(['Akademik', 'Non-Akademik']),
            'description' => fake()->text(),
            'photo' => fake()->word(),
        ];
    }
}
