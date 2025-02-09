<?php

namespace Database\Seeders;

use App\Models\Common_question;
use App\Models\Common_questionTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Common_question_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each common question
        foreach (Common_question::all() as $commonQuestion) {
            foreach ($locales as $locale) {
                Common_questionTranslation::factory()->create([
                    'common_question_id' => $commonQuestion->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
