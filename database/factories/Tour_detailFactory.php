<?php

namespace Database\Factories;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour_detail>
 */
class Tour_detailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tour_id' => Tour::factory(), // Create a new tour for the detail
            'duration' => $this->faker->numberBetween(1, 10), // Random duration between 1 and 10
            'duration_type' => $this->faker->randomElement(['hours', 'days']), // Randomly set duration type
        ];
    }
}
