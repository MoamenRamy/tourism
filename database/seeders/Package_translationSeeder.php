<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PackageTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Package_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each package
        foreach (Package::all() as $package) {
            foreach ($locales as $locale) {
                PackageTranslation::factory()->create([
                    'package_id' => $package->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
