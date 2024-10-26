<?php

namespace Database\Factories;

use App\Models\Package;
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
    protected $model = Package::class;

    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 10, 1000), // Generates a price with 2 decimal places between 10 and 1000
            'duration' => $this->faker->optional()->numberBetween(1, 30), // Optional duration between 1 and 30
            'duration_type' => $this->faker->randomElement(['hours', 'days']), // Randomly assign 'hours' or 'days'
            'available' => $this->faker->boolean(), // Random boolean for availability
            'pin' => $this->faker->boolean(), // Random boolean for pin status
        ];
    }
}
