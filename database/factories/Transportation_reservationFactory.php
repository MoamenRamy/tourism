<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Transportation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_reservation>
 */
class Transportation_reservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transportation_id' => Transportation::inRandomOrder()->first()->id ?? null, // Nullable
            'user_id' => User::inRandomOrder()->first()->id, // Required
            'currency_id' => Currency::inRandomOrder()->first()->id ?? null, // Nullable
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'address' => $this->faker->address,
            'hotel' => $this->faker->company, // Simulating a hotel name
            'flight_number' => $this->faker->numerify('FL###'),
            'guest' => $this->faker->numberBetween(1, 5),
            'reservation_dateTime' => $this->faker->dateTimeBetween('now', '+1 year'),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'phone' => $this->faker->phoneNumber,
            'whatsapp' => $this->faker->e164PhoneNumber,
            'note' => $this->faker->sentence,
            'payment_status' => $this->faker->randomElement(['unpaid', 'deposit', 'paid']),
        ];
    }
}
