<?php

namespace Database\Seeders;

use App\Models\Additional_service;
use App\Models\Additional_serviceTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Additional_service_translationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each additional service
        foreach (Additional_service::all() as $additionalService) {
            foreach ($locales as $locale) {
                Additional_serviceTranslation::factory()->create([
                    'additional_service_id' => $additionalService->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
