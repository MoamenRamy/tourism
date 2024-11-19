<?php

namespace Database\Factories;

use App\Models\TourSection;
use App\Models\TourSectionTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TourSectionTranslation>
 */
class TourSectionTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TourSectionTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tour_section_id' => TourSection::factory(), // Assumes you have a factory for TourSection
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'address' => $this->faker->address(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
