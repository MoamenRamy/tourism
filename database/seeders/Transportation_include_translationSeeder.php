<?php

namespace Database\Seeders;

use App\Models\Transportation_include;
use App\Models\Transportation_includeTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_include_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each transportation include
        foreach (Transportation_include::all() as $include) {
            foreach ($locales as $locale) {
                Transportation_includeTranslation::factory()->create([
                    'transportation_include_id' => $include->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
