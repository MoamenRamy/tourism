<?php

namespace Database\Seeders;

use App\Models\Transportation_common_question;
use App\Models\Transportation_common_questionTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_common_question_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each common question
        foreach (Transportation_common_question::all() as $commonQuestion) {
            foreach ($locales as $locale) {
                Transportation_common_questionTranslation::factory()->create([
                    'question_id' => $commonQuestion->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
