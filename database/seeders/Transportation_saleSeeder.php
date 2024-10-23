<?php

namespace Database\Seeders;

use App\Models\Transportation_sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_saleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transportation_sale::factory()->count(30)->create();
    }
}
