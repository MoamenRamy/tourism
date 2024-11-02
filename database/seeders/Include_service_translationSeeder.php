<?php

namespace Database\Seeders;

use App\Models\Include_service;
use App\Models\Include_serviceTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Include_service_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each include service
        foreach (Include_service::all() as $includeService) {
            foreach ($locales as $locale) {
                Include_serviceTranslation::factory()->create([
                    'include_id' => $includeService->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
