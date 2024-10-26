<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Destination::class;

    public function definition(): array
    {
        return [
            'photo' => $this->faker->imageUrl(800, 600, 'nature', true, 'destination'), // Random destination photo URL
        ];
    }
}
