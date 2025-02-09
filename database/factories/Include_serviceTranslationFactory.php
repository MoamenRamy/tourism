<?php

namespace Database\Factories;

use App\Models\Include_service;
use App\Models\Include_serviceTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Include_serviceTranslation>
 */
class Include_serviceTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Include_serviceTranslation::class;

    public function definition(): array
    {
        return [
            'include_service_id' => Include_service::factory(), // Creates a related IncludeService
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'name' => $this->faker->word, // Generates a random name for the service
        ];
    }
}
