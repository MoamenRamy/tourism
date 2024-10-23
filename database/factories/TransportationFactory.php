<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'destination_id' => \App\Models\Destination::factory(), // Creates a related destination record
            'price' => $this->faker->randomFloat(2, 100, 1000), // Random price between 100 and 1000
            'vehicle_id' => \App\Models\Vehicle::factory(), // Creates a related vehicle record
            'available' => $this->faker->boolean(), // Random boolean for availability
        ];
    }
}
