<?php

namespace Database\Seeders;

use App\Models\Transportation_additional_service;
use App\Models\Transportation_additional_serviceTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_additional_service_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each additional service
        foreach (Transportation_additional_service::all() as $additionalService) {
            foreach ($locales as $locale) {
                Transportation_additional_serviceTranslation::factory()->create([
                    'transportation_additional_service_id' => $additionalService->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
