<?php

namespace Database\Seeders;

use App\Models\Package_service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Package_serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package_service::factory(50)->create(); // Create 50 package service records
    }
}
