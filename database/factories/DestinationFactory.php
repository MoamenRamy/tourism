<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
        $name = $this->faker->unique()->city();
        return [
            'name' => $name, // Random city name for destination
            'slug' => Str::slug($name), // Generate slug
            'photo' => $this->faker->imageUrl(800, 600, 'nature', true, 'destination'), // Random destination photo URL
        ];
    }
}
