<?php

namespace Database\Factories;

use App\Models\Tour_detail;
use App\Models\Tour_detailTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour_detailTranslation>
 */
class Tour_detailTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tour_detailTranslation::class;

    public function definition(): array
    {
        return [
            'tour_detail_id' => Tour_detail::factory(), // Create a new tour detail for the translation
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'address' => $this->faker->address, // Random address
            'description' => $this->faker->paragraph, // Random description
        ];
    }
}
