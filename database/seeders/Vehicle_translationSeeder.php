<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehicleTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Vehicle_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each vehicle record
        foreach (Vehicle::all() as $vehicle) {
            foreach ($locales as $locale) {
                VehicleTranslation::factory()->create([
                    'vehicle_id' => $vehicle->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
