<?php

namespace Database\Seeders;

use App\Models\Tour_detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tour_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour_detail::factory()->count(50)->create(); // Adjust the count as needed
    }
}
