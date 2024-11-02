<?php

namespace Database\Seeders;

use App\Models\Tour_detail;
use App\Models\Tour_detailTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tour_detail_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each tour detail
        foreach (Tour_detail::all() as $tourDetail) {
            foreach ($locales as $locale) {
                Tour_detailTranslation::factory()->create([
                    'tour_detail_id' => $tourDetail->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
