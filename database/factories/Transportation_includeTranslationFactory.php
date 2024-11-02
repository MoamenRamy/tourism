<?php

namespace Database\Factories;

use App\Models\Transportation_include;
use App\Models\Transportation_includeTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_includeTranslation>
 */
class Transportation_includeTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Transportation_includeTranslation::class;

    public function definition(): array
    {
        return [
            'include_id' => Transportation_include::factory(), // Use factory for include_id
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'name' => $this->faker->sentence, // Random name
        ];
    }
}
