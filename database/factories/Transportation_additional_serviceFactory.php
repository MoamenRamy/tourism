<?php

namespace Database\Factories;

use App\Models\Transportation_additional_service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_additional_service>
 */
class Transportation_additional_serviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Transportation_additional_service::class;

    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 10, 100),  // Random price between 10 and 100
        ];
    }
}
