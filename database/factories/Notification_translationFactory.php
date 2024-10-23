<?php

namespace Database\Factories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification_translation>
 */
class Notification_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'notification_id' => Notification::factory(), // Create a new notification for the translation
            'locale' => $this->faker->randomElement(['en', 'fr', 'es']), // Example locales
            'message' => $this->faker->text(100), // Random message text
            'status' => $this->faker->randomElement(['unread', 'read']), // Random status
        ];
    }
}
