<?php

namespace Database\Factories;

use App\Models\Tour;
use App\Models\Tour_translation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour_translation>
 */
class Tour_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tour_translation::class;

    public function definition(): array
    {
        return [
            'tour_id' => Tour::factory(), // Create related tour or use existing one
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'name' => $this->faker->sentence(3), // Random name for tour
            'defination' => $this->faker->sentence(10), // Short description
            'description' => $this->faker->paragraph(), // Random detailed description
        ];
    }
}
