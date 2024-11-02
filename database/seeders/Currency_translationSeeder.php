<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\CurrencyTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Currency_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each currency
        foreach (Currency::all() as $currency) {
            foreach ($locales as $locale) {
                CurrencyTranslation::factory()->create([
                    'currency_id' => $currency->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
