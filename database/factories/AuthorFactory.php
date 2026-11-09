<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'position' => fake()->randomElement(['Barangay Captain', 'Barangay Secretary', 'BHW', 'Tanod Commander', 'Purok Leader']),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}