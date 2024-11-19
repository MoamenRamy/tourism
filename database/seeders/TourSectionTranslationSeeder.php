<?php

namespace Database\Seeders;

use App\Models\TourSection;
use App\Models\TourSectionTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSectionTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each additional service
        foreach (TourSection::all() as $tourSection) {
            foreach ($locales as $locale) {
                TourSectionTranslation::factory()->create([
                    'tour_section_id' => $tourSection->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
