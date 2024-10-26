<?php

namespace Database\Factories;

use App\Models\Destination;
use App\Models\Destination_translation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination_translation>
 */
class Destination_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Destination_translation::class;

    public function definition(): array
    {
        return [
            'destination_id' => Destination::factory(), // Create related destination or use existing one
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'name' => $this->faker->city(), // Random city name for destination
            'description' => $this->faker->paragraph(), // Random description for the destination
        ];
    }
}
