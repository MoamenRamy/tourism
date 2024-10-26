<?php

namespace Database\Factories;

use App\Models\Common_question;
use App\Models\Common_question_translation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Common_question_translation>
 */
class Common_question_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Common_question_translation::class;

    public function definition(): array
    {
        return [
            'question_id' => Common_question::factory(), // Create related common question or use existing one
            'locale' => $this->faker->locale, // Random locale
            'question' => $this->faker->sentence, // Random question
            'answer' => $this->faker->paragraph, // Random answer
        ];
    }
}
