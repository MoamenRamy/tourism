<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\CurrencyTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CurrencyTranslation>
 */
class CurrencyTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CurrencyTranslation::class;

    public function definition(): array
    {
        return [
            'currency_id' => Currency::inRandomOrder()->first()->id,
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // No unique constraint
            'name' => $this->faker->word(),
        ];
    }
}
