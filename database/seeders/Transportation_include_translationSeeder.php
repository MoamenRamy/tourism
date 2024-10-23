<?php

namespace Database\Seeders;

use App\Models\Transportation_include;
use App\Models\Transportation_include_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_include_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create translations for each transportation include
        $includes = Transportation_include::all();

        foreach ($includes as $include) {
            Transportation_include_translation::factory()->create([
                'include_id' => $include->id,
                'locale' => 'en', // Example locale
                'name' => 'Include Service Name in English', // Example name
            ]);

            Transportation_include_translation::factory()->create([
                'include_id' => $include->id,
                'locale' => 'fr', // Another example locale
                'name' => 'Nom du service inclus en français', // Example name in French
            ]);
        }
    }
}
