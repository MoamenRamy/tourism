<?php

namespace Database\Seeders;

use App\Models\Tour_detail;
use App\Models\Tour_detail_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tour_detail_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a set number of translations for existing tour details
        $tourDetails = Tour_detail::all();

        foreach ($tourDetails as $tourDetail) {
            Tour_detail_translation::factory()->count(3)->create([
                'tour_detail_id' => $tourDetail->id, // Link translations to the current tour detail
                'locale' => 'en', // Example locale; you can adjust this based on your needs
            ]);
        }
    }
}
