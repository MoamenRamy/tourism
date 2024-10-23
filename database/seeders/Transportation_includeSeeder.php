<?php

namespace Database\Seeders;

use App\Models\Transportation_include;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_includeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a number of transportation include records
        Transportation_include::factory()->count(10)->create();
    }
}
