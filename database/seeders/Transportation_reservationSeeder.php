<?php

namespace Database\Seeders;

use App\Models\Transportation_reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_reservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transportation_reservation::factory()->count(50)->create();
    }
}
