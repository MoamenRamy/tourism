<?php

namespace Database\Seeders;

use App\Models\Transportation_common_question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_common_questionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transportation_common_question::factory()->count(10)->create();
    }
}
