<?php

namespace Database\Factories;

use App\Models\Additional_service;
use App\Models\Additional_service_translations;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Additional_service_translations>
 */
class Additional_service_translationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Additional_service_translations::class;

    public function definition(): array
    {
        return [
            'additional_id' => Additional_service::factory(), // Create related additional service or use existing one
            'locale' => $this->faker->locale, // Random locale
            'name' => $this->faker->word, // Random name for the additional service
            'description' => $this->faker->optional()->sentence(), // Random description (optional)
        ];
    }
}
