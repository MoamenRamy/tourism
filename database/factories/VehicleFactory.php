<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Vehicle::class;

    public function definition(): array
    {
        return [
            'year' => $this->faker->year(), // Generates a random year
            'photo' => $this->faker->imageUrl(640, 480, 'cars'), // Generates a URL for a random car photo
            'car_load' => $this->faker->numberBetween(1, 8), // Generates a random load capacity between 1 and 8
        ];
    }
}
