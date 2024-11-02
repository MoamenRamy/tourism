<?php

namespace Database\Factories;

use App\Models\Safety;
use App\Models\SafetyTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SafetyTranslation>
 */
class SafetyTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SafetyTranslation::class;

    public function definition(): array
    {
        return [
            'safety_id' => Safety::factory(), // Creates or associates a Safety record
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'name' => $this->faker->word(), // Random safety name
        ];
    }
}
