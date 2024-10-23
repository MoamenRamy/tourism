<?php

namespace Database\Seeders;

use App\Models\Common_question_tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Common_question_tourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Common_question_tour::factory(50)->create(); // Create 50 common question tour records
    }
}
