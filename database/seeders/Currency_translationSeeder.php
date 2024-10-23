<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Currency_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Currency_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::factory(10)
        ->has(Currency_translation::factory()->count(3)) // Each currency will have 3 translations
        ->create();
    }
}
