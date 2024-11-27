<?php

namespace Database\Seeders;

use App\Models\Safety;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SafetySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Safety::factory()->count(10)->create(); // Adjust the count as needed
    }
}
