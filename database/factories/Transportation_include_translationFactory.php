<?php

namespace Database\Factories;

use App\Models\Transportation_include;
use App\Models\Transportation_include_translation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_include_translation>
 */
class Transportation_include_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Transportation_include_translation::class;

    public function definition(): array
    {
        return [
            'include_id' => Transportation_include::factory(), // Use factory for include_id
            'locale' => $this->faker->locale, // Random locale
            'name' => $this->faker->sentence, // Random name
        ];
    }
}
