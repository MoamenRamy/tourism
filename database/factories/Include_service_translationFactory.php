<?php

namespace Database\Factories;

use App\Models\Include_service;
use App\Models\Include_service_translation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Include_service_translation>
 */
class Include_service_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Include_service_translation::class;

    public function definition(): array
    {
        return [
            'include_id' => Include_service::factory(), // Creates a related IncludeService
            'locale' => $this->faker->locale, // Generates a random locale (e.g., en_US, fr_FR)
            'name' => $this->faker->word, // Generates a random name for the service
        ];
    }
}
