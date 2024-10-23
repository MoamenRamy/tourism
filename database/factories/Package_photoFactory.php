<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package_photo>
 */
class Package_photoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'package_id' => Package::factory(), // Create related package or use existing one
            'photo' => $this->faker->imageUrl(640, 480, 'abstract'), // Generate a random image URL
        ];
    }
}
