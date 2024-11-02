<?php

namespace Database\Factories;

use App\Models\Transportation_additional_service;
use App\Models\Transportation_additional_serviceTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_additional_serviceTranslation>
 */
class Transportation_additional_serviceTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Transportation_additional_serviceTranslation::class;

    public function definition(): array
    {
        return [
            'additional_id' => Transportation_additional_service::factory(), // Creates a new additional if none exists
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'name' => $this->faker->word,  // Random name for the service
            'description' => $this->faker->text,  // Random description
        ];
    }
}
