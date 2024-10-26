<?php

namespace Database\Factories;

use App\Models\Additional_service;
use App\Models\Additional_service_reservation;
use App\Models\Tour_reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Additional_service_reservation>
 */
class Additional_service_reservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Additional_service_reservation::class;

    public function definition(): array
    {
        return [
            'additional_id' => Additional_service::factory(), // Create related additional service or use existing one
            'reservation_id' => Tour_reservation::factory(), // Create related tour reservation or use existing one
        ];
    }
}
