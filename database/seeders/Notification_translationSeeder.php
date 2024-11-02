<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\NotificationTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Notification_translationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es', 'de', 'ar'];

        // Loop through each notification
        foreach (Notification::all() as $notification) {
            foreach ($locales as $locale) {
                NotificationTranslation::factory()->create([
                    'notification_id' => $notification->id,
                    'locale' => $locale,
                ]);
            }
        }
    }
}
