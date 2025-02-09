<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Currency;
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
    protected $model = Currency::class;

    public function definition(): array
    {
        do {
            $code = strtoupper(Str::random(3)); // Generate a random 3-letter code
        } while (Currency::where('code', $code)->exists()); // Check if the code already exists
        $slug = Str::slug($code);

        return [
            'code' => $code,
            'slug' => $slug,
            'symbol' => $this->faker->randomElement(['$', '€', '£', '¥', '₹']),
            'exchange_rate' => $this->faker->randomFloat(2, 0.5, 100),
        ];
    }
}
