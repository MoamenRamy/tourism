<?php

namespace Database\Seeders;

use App\Models\Package_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Package_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package_translation::factory(50)->create(); // Create 50 package translation records
    }
}
