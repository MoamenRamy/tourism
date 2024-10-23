<?php

namespace Database\Seeders;

use App\Models\Safety_tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Safety_tourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Safety_tour::factory(50)->create();
    }
}
