<?php

namespace Database\Factories;

use App\Models\Rate;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rate>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Rate::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Create related user or use existing one
            'tour_id' => Tour::factory(), // Create related tour or use existing one
            'rating' => $this->faker->numberBetween(1, 5), // Random rating between 1 and 5
        ];
    }
}
