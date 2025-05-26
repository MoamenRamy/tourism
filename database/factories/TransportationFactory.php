<?php

namespace Database\Factories;

use App\Models\Transportation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation>
 */
class TransportationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Transportation::class;

    public function definition(): array
    {
        return [
            'destination_id' => \App\Models\Destination::factory(), // Creates a related destination record
            // 'price' => $this->faker->randomFloat(2, 10, 1000), // Generates a price with 2 decimal places between 10 and 1000
            // 'vehicle_id' => \App\Models\Vehicle::factory(), // Creates a related vehicle record
            'available' => $this->faker->boolean(), // Random boolean for availability
        ];
    }
}
