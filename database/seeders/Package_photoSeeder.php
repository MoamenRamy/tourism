<?php

namespace Database\Seeders;

use App\Models\Package_photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Package_photoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package_photo::factory(30)->create(); // Create 30 package photo records
    }
}
