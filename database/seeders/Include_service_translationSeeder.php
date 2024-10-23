<?php

namespace Database\Seeders;

use App\Models\Include_service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Include_service_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Include_service::factory(50)
        ->hasIncludeServiceTranslations(3) // Adjust the number of translations per include service
        ->create();
    }
}
