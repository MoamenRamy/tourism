<?php

namespace Database\Factories;

use App\Models\Destination;
use App\Models\DestinationTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DestinationTranslation>
 */
class DestinationTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = DestinationTranslation::class;

    public function definition(): array
    {
        return [
            'destination_id' => Destination::factory(), // Create related destination or use existing one
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'description' => $this->faker->paragraph(), // Random description for the destination
        ];
    }
}
