<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour_reservation>
 */
class Tour_reservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tour_id' => Tour::factory(), // Create related tour or use existing one
            'user_id' => User::factory(), // Create related user or use existing one
            'first_name' => $this->faker->firstName(), // Random first name
            'last_name' => $this->faker->lastName(), // Random last name
            'address' => $this->faker->address(), // Random address
            'guest' => $this->faker->numberBetween(1, 10), // Random number of guests between 1 and 10
            'reservation_date' => $this->faker->date(), // Random reservation date
            'price' => $this->faker->decimal(8, 2), // Random price
            'phone' => $this->faker->phoneNumber(), // Random phone number
            'whatsapp' => $this->faker->phoneNumber(), // Random WhatsApp number
            'currency_id' => Currency::factory(), // Create related currency or use existing one
            'note' => $this->faker->sentence(10), // Random note
            'payment_status' => $this->faker->randomElement(['unpaid', 'deposit', 'paid']), // Random payment status
        ];
    }
}
