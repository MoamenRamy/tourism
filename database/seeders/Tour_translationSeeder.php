<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\Tour_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tour_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour::factory(10)
        ->has(Tour_translation::factory()->count(3)) // Each tour has 3 translations
        ->create();
    }
}
