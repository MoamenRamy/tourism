<?php

namespace Database\Seeders;

use App\Models\Transportation_common_question;
use App\Models\Transportation_common_question_translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Transportation_common_question_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transportationCommons = Transportation_common_question::all();

        foreach ($transportationCommons as $common) {
            Transportation_common_question_translation::factory()->count(2)->create([
                'question_id' => $common->id,
            ]);
        }
    }
}
