<?php

namespace Database\Seeders;

use App\Models\Notification_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Notification_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notification_translation::factory()->count(100)->create(); // Adjust the count as needed
    }
}
