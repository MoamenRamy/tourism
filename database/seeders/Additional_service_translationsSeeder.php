<?php

namespace Database\Seeders;

use App\Models\Additional_service_translations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Additional_service_translationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Additional_service_translations::factory(50)->create(); // Create 50 additional service translation records
    }
}
