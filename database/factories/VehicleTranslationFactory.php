<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\VehicleTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehicleTranslation>
 */
class VehicleTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = VehicleTranslation::class;

    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory(), // Creates a related vehicle record
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'name' => $this->faker->word(), // Generates a random vehicle name
            'model' => $this->faker->word(), // Generates a random vehicle model
        ];
    }
}
