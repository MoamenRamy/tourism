<?php

namespace Database\Factories;

use App\Models\Additional_service;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Additional_service_tour>
 */
class Additional_service_tourFactory extends Factory
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
            'additional_id' => Additional_service::factory(), // Create related additional service or use existing one
        ];
    }
}
