<?php

namespace Database\Factories;

use App\Models\Transportation_include;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_include_translation>
 */
class Transportation_include_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'include_id' => Transportation_include::factory(), // Use factory for include_id
            'locale' => $this->faker->locale, // Random locale
            'name' => $this->faker->sentence, // Random name
        ];
    }
}
