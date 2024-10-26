<?php

namespace Database\Factories;

use App\Models\Transportation_additional_service;
use App\Models\Transportation_additional_service_translation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_additional_service_translation>
 */
class Transportation_additional_service_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Transportation_additional_service_translation::class;

    public function definition(): array
    {
        return [
            'additional_id' => Transportation_additional_service::factory(), // Creates a new additional if none exists
            'locale' => $this->faker->locale,  // Random locale
            'name' => $this->faker->word,  // Random name for the service
            'description' => $this->faker->text,  // Random description
        ];
    }
}
