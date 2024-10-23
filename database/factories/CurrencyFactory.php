<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->currencyCode, // Generate random currency code like USD, EUR
            'symbol' => $this->faker->randomElement(['$', '€', '£', '¥', '₹']), // Random symbols
            'exchange_rate' => $this->faker->randomFloat(2, 0.5, 100), // Random exchange rate between 0.5 and 100
        ];
    }
}
