<?php

namespace Database\Factories;

use App\Models\Tour;
use App\Models\TourSection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TourSection>
 */
class TourSectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TourSection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tour_id' => Tour::factory(), // Assumes you have a factory for the `Tour` model
            'duration' => $this->faker->randomFloat(1, 0.5, 10), // Duration between 0.5 and 10 (e.g., 1.5, 2.5)
            'duration_type' => $this->faker->randomElement(['hours', 'days']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
