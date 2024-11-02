<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\DestinationTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Destination_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each destination
        foreach (Destination::all() as $destination) {
            foreach ($locales as $locale) {
                DestinationTranslation::factory()->create([
                    'destination_id' => $destination->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
