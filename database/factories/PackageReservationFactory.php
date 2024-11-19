<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Package;
use App\Models\PackageReservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PackageReservation>
 */
class PackageReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PackageReservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'package_id' => Package::factory(), // Assumes you have a factory for the Package model
            'user_id' => User::factory(), // Assumes you have a factory for the User model
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'address' => $this->faker->address(),
            'guest' => $this->faker->numberBetween(1, 10), // Random number of guests between 1 and 10
            'reservation_date' => $this->faker->dateTimeBetween('+1 days', '+1 year'), // Future dates
            'price' => $this->faker->randomFloat(2, 50, 1000), // Random price between 50 and 1000
            'phone' => $this->faker->phoneNumber(),
            'whatsapp' => $this->faker->phoneNumber(),
            'currency_id' => Currency::factory(), // Assumes you have a factory for the Currency model
            'note' => $this->faker->optional()->text(200), // Optional note
            'payment_status' => $this->faker->randomElement(['unpaid', 'deposit', 'paid']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
