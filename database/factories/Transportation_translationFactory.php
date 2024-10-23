<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_translation>
 */
class Transportation_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transportation_id' => \App\Models\Transportation::factory(), // Generates related transportation
            'locale' => $this->faker->randomElement(['en', 'fr', 'de', 'es']), // Random locale
            'from' => $this->faker->city(), // Random city for "from"
            'to' => $this->faker->city(), // Random city for "to"
        ];
    }
}
