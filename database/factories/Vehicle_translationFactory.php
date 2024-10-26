<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\Vehicle_translation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle_translation>
 */
class Vehicle_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Vehicle_translation::class;

    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory(), // Creates a related vehicle record
            'locale' => $this->faker->randomElement(['en', 'fr', 'de', 'es']), // Random locale
            'name' => $this->faker->word(), // Generates a random vehicle name
            'model' => $this->faker->word(), // Generates a random vehicle model
        ];
    }
}
