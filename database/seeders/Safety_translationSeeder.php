<?php

namespace Database\Seeders;

use App\Models\Safety;
use App\Models\SafetyTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Safety_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each safety record
        foreach (Safety::all() as $safety) {
            foreach ($locales as $locale) {
                SafetyTranslation::factory()->create([
                    'safety_id' => $safety->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
