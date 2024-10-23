<?php

namespace Database\Seeders;

use App\Models\Transportation_additional_service;
use App\Models\Transportation_additional_service_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_additional_service_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you want to create translations for existing additional services
        $additionalServices = Transportation_additional_service::all();

        foreach ($additionalServices as $additional) {
            Transportation_additional_service_translation::factory()->count(3)->create([
                'additional_id' => $additional->id,
            ]);
        }
    }
}
