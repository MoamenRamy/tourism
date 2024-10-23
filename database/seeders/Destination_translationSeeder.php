<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Destination_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Destination_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::factory(10)
        ->has(Destination_translation::factory()->count(3)) // Each destination has 3 translations
        ->create();
    }
}
