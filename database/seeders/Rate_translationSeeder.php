<?php

namespace Database\Seeders;

use App\Models\Rate;
use App\Models\RateTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Rate_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each rate
        foreach (Rate::all() as $rate) {
            foreach ($locales as $locale) {
                RateTranslation::factory()->create([
                    'rate_id' => $rate->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
