<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->optional()->randomFloat(2, 50, 500), // Optional price between 50 and 500
            'duration' => $this->faker->optional()->numberBetween(1, 30), // Optional duration between 1 and 30
            'duration_type' => $this->faker->randomElement(['hours', 'days']), // Randomly assign 'hours' or 'days'
            'available' => $this->faker->boolean(), // Random boolean for availability
            'pin' => $this->faker->boolean(), // Random boolean for pin status
        ];
    }
}
