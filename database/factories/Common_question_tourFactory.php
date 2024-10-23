<?php

namespace Database\Factories;

use App\Models\Common_question;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Common_question_tour>
 */
class Common_question_tourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tour_id' => Tour::factory(), // Create related tour or use existing one
            'question_id' => Common_question::factory(), // Create related common question or use existing one
        ];
    }
}
