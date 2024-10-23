<?php

namespace Database\Seeders;

use App\Models\Additional_service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Additional_serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Additional_service::factory(30)->create(); // Create 30 additional service records
    }
}
