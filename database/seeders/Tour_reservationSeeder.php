<?php

namespace Database\Seeders;

use App\Models\Tour_reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tour_reservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour_reservation::factory(20)->create(); // Create 20 tour reservation records
    }
}
