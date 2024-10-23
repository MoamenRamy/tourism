<?php

namespace Database\Seeders;

use App\Models\Rate_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Rate_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rate_translation::factory(200)->create(); // Create 200 rate translation records
    }
}
