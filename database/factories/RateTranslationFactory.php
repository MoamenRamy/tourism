<?php

namespace Database\Factories;

use App\Models\Rate;
use App\Models\RateTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RateTranslation>
 */
class RateTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = RateTranslation::class;

    public function definition(): array
    {
        return [
            'rate_id' => Rate::factory(), // Create related rate or use existing one
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'comment' => $this->faker->optional()->text(200), // Random comment, nullable
        ];
    }
}
