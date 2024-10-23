<?php

namespace Database\Factories;

use App\Models\Safety;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Safety_translation>
 */
class Safety_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'safety_id' => Safety::factory(), // Creates or associates a Safety record
            'locale' => $this->faker->randomElement(['en', 'fr', 'es']), // Random locale
            'name' => $this->faker->word(), // Random safety name
        ];
    }
}
