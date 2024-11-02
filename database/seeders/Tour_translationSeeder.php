<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tour_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each tour record
        foreach (Tour::all() as $tour) {
            foreach ($locales as $locale) {
                TourTranslation::factory()->create([
                    'tour_id' => $tour->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
