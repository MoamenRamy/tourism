<?php

namespace Database\Factories;

use App\Models\TransportationTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransportationTranslation>
 */
class TransportationTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TransportationTranslation::class;

    public function definition(): array
    {
        return [
            'transportation_id' => \App\Models\Transportation::factory(), // Generates related transportation
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'from' => $this->faker->city(), // Random city for "from"
            'to' => $this->faker->city(), // Random city for "to"
        ];
    }
}
