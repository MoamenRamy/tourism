<?php

namespace Database\Factories;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rate_translation>
 */
class Rate_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rate_id' => Rate::factory(), // Create related rate or use existing one
            'locale' => $this->faker->locale, // Random locale (e.g., 'en_US', 'fr_FR')
            'comment' => $this->faker->optional()->text(200), // Random comment, nullable
        ];
    }
}
