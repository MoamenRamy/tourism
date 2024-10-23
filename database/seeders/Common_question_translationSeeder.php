<?php

namespace Database\Seeders;

use App\Models\Common_question_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Common_question_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Common_question_translation::factory(50)->create(); // Create 50 common question translation records
    }
}
