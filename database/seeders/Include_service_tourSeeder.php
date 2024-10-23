<?php

namespace Database\Seeders;

use App\Models\Include_service_tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Include_service_tourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Include_service_tour::factory(50)->create();
    }
}
