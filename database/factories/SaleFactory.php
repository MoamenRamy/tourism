<?php

namespace Database\Factories;

use App\Models\Sale;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Sale::class;

    public function definition(): array
    {
        return [
            'tour_id' => Tour::factory(), // Create related tour or use existing one
            'discount_percentage' => $this->faker->optional()->randomFloat(2, 0, 100), // Random discount percentage
            'discount_amount' => $this->faker->optional()->randomFloat(2, 0, 1000), // Random discount amount
            'discount_start_date' => $this->faker->optional()->date(), // Random start date
            'discount_end_date' => $this->faker->optional()->date(), // Random end date
            'active' => $this->faker->boolean(50), // Random boolean value (50% chance to be true)
        ];
    }
}
