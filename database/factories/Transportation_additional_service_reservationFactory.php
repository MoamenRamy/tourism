<?php

namespace Database\Factories;

use App\Models\Transportation_additional_service;
use App\Models\Transportation_reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_additional_service_reservation>
 */
class Transportation_additional_service_reservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'additional_id' => Transportation_additional_service::factory(), // Creates a new additional if none exists
            'reservation_id' => Transportation_reservation::factory(), // Creates a new reservation if none exists
        ];
    }
}
