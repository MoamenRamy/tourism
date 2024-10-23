<?php

namespace Database\Seeders;

use App\Models\Tour_photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tour_photoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour_photo::factory(30)->create(); // Create 30 tour photo records
    }
}
