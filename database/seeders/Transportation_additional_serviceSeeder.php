<?php

namespace Database\Seeders;

use App\Models\Transportation_additional_service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_additional_serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transportation_additional_service::factory()->count(20)->create();
    }
}
