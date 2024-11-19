<?php

namespace Database\Seeders;

use App\Models\TourSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TourSection::factory(20)->create(); // Create 20 tour records

    }
}
