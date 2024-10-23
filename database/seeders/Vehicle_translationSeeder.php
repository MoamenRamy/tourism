<?php

namespace Database\Seeders;

use App\Models\Vehicle_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Vehicle_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle_translation::factory(50)->create();
    }
}
