<?php

namespace Database\Factories;

use App\Models\Tour_detail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour_detail_translation>
 */
class Tour_detail_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tour_detail_id' => Tour_detail::factory(), // Create a new tour detail for the translation
            'locale' => $this->faker->locale(), // Random locale
            'address' => $this->faker->address, // Random address
            'description' => $this->faker->paragraph, // Random description
        ];
    }
}
