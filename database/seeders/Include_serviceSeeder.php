<?php

namespace Database\Seeders;

use App\Models\Include_service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Include_serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Include_service::factory(50)->create(); // Create 50 include service records
    }
}
