<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Category_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Category_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(10)
        ->has(Category_translation::factory()->count(3)) // Each category has 3 translations
        ->create();
    }
}
