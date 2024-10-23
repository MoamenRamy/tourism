<?php

namespace Database\Seeders;

use App\Models\Common_question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Common_questionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Common_question::factory()->count(10)->create();
    }
}
