<?php

namespace Database\Factories;

use App\Models\Transportation_common_question;
use App\Models\Transportation_common_questionTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_common_questionTranslation>
 */
class Transportation_common_questionTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Transportation_common_questionTranslation::class;

    public function definition(): array
    {
        return [
            'transportation_common_question_id' => Transportation_common_question::factory(), // Create a related TransportationCommon
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'question' => $this->faker->sentence, // Random question
            'answer' => $this->faker->paragraph, // Random answer
        ];
    }
}
