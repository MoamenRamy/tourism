<?php

namespace Database\Seeders;

use App\Models\PackageReservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackageReservation::factory()->count(20)->create();
    }
}
