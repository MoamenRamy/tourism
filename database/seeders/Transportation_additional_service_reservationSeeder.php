<?php

namespace Database\Seeders;

use App\Models\Transportation_additional_service_reservation;
use App\Models\Transportation_reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_additional_service_reservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you want to create additional reservations for existing transportation reservations
        $reservations = Transportation_reservation::all();

        foreach ($reservations as $reservation) {
            // Randomly associate additional services with reservations
            $additionalServicesCount = rand(1, 3); // Random number of additional services per reservation
            Transportation_additional_service_reservation::factory()->count($additionalServicesCount)->create([
                'reservation_id' => $reservation->id,
            ]);
        }
    }
}
