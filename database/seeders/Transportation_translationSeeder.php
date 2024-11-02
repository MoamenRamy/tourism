<?php

namespace Database\Seeders;

use App\Models\Transportation;
use App\Models\TransportationTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each transportation record
        foreach (Transportation::all() as $transportation) {
            foreach ($locales as $locale) {
                TransportationTranslation::factory()->create([
                    'transportation_id' => $transportation->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
