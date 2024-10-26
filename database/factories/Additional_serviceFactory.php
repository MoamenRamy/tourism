<?php

namespace Database\Factories;

use App\Models\Additional_service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Additional_service>
 */
class Additional_serviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Additional_service::class;

    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 10, 100), // Random price between 10 and 100
        ];
    }
}
