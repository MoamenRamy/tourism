<?php

namespace Database\Seeders;

use App\Models\Additional_service_tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Additional_service_tourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Additional_service_tour::factory(50)->create(); // Create 50 additional service tour records
    }
}
