<?php

namespace Database\Factories;

use App\Models\Additional_service;
use App\Models\Additional_serviceTranslations;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Additional_serviceTranslations>
 */
class Additional_serviceTranslationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Additional_serviceTranslations::class;

    public function definition(): array
    {
        return [
            'additional_id' => Additional_service::factory(), // Create related additional service or use existing one
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // No unique constraint
            'name' => $this->faker->word, // Random name for the additional service
            'description' => $this->faker->optional()->sentence(), // Random description (optional)
        ];
    }
}
