<?php

namespace Database\Factories;

use App\Models\Transportation_common_question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_common_question_translation>
 */
class Transportation_common_question_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_id' => Transportation_common_question::factory(), // Create a related TransportationCommon
            'locale' => $this->faker->locale, // Random locale
            'question' => $this->faker->sentence, // Random question
            'answer' => $this->faker->paragraph, // Random answer
        ];
    }
}
