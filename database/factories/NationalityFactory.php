<?php

namespace Database\Factories;

use App\Models\Nationality;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nationality>
 */
class NationalityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Nationality::class;

    public function definition()
    {
        // return [
        //     'name' => $this->faker->country(), // Random country name
        //     'phone_code' => $this->faker->randomElement(['+1', '+44', '+33', '+49', '+20']), // Random phone code
        //     'flag' => $this->faker->imageUrl(100, 50, 'flags', true), // Random flag image URL
        // ];
    }
}
