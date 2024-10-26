<?php

namespace Database\Factories;

use App\Models\Transportation_include;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportation_include>
 */
class Transportation_includeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Transportation_include::class;

    public function definition(): array
    {
        return [
            'include' => $this->faker->boolean(), // Randomly set include to true or false
        ];
    }
}
