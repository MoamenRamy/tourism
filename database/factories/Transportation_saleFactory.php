<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_sale>
 */
class Transportation_saleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'destination_id' => Destination::inRandomOrder()->first()->id, // Select a random destination
            'discount_percentage' => $this->faker->optional()->randomFloat(2, 0, 50),
            'discount_amount' => $this->faker->optional()->randomFloat(2, 10, 500),
            'discount_start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'discount_end_date' => $this->faker->dateTimeBetween('+1 month', '+6 months'),
            'active' => $this->faker->boolean,
        ];
    }
}
