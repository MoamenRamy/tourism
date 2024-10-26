<?php

namespace Database\Factories;

use App\Models\Include_service;
use App\Models\Include_service_tour;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Include_service_tour>
 */
class Include_service_tourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Include_service_tour::class;

    public function definition(): array
    {
        return [
            'tour_id' => Tour::factory(), // Creates a related Tour
            'include_id' => Include_service::factory(), // Creates a related IncludeService
        ];
    }
}
