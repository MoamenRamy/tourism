<?php

namespace Database\Factories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Notification::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), // Create a new user for the notification
            'service_type' => $this->faker->randomElement(['tour', 'transportation']), // Random service type
            'service_id' => $this->faker->numberBetween(1, 100), // Assuming your services are within this range
        ];
    }
}
