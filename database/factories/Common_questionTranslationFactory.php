<?php

namespace Database\Factories;

use App\Models\Common_question;
use App\Models\Common_questionTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Common_questionTranslation>
 */
class Common_questionTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Common_questionTranslation::class;

    public function definition(): array
    {
        return [
            'question_id' => Common_question::factory(), // Create related common question or use existing one
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'question' => $this->faker->sentence, // Random question
            'answer' => $this->faker->paragraph, // Random answer
        ];
    }
}
