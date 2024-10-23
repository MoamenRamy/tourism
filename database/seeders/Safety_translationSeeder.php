<?php

namespace Database\Seeders;

use App\Models\Safety_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Safety_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Safety_translation::factory(50)->create();
    }
}
