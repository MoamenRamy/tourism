<?php

namespace Database\Factories;

use App\Models\Safety;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Safety_tour>
 */
class Safety_tourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tour_id' => Tour::factory(), // Creates or associates a Tour record
            'safety_id' => Safety::factory(), // Creates or associates a Safety record
        ];
    }
}
