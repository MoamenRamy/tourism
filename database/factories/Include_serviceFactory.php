<?php

namespace Database\Factories;

use App\Models\Include_service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Include_service>
 */
class Include_serviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Include_service::class;

    public function definition(): array
    {
        return [
            'include' => $this->faker->boolean(80), // 80% chance to be true (included)
        ];
    }
}
