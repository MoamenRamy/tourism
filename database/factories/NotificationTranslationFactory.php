<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\NotificationTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NotificationTranslation>
 */
class NotificationTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = NotificationTranslation::class;

    public function definition(): array
    {
        return [
            'notification_id' => Notification::factory(), // Create a new notification for the translation
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'message' => $this->faker->text(100), // Random message text
            'status' => $this->faker->randomElement(['unread', 'read']), // Random status
        ];
    }
}
