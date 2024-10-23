<?php

namespace Database\Seeders;

use App\Models\Transportation_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transportation_translation::factory(50)->create();
    }
}
