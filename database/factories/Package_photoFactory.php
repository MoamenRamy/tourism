<?php

namespace Database\Factories;

// use App\Models\Package;
use App\Models\Package_photo;
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
    protected $model = Package_photo::class;

    public function definition(): array
    {
        return [
            'package_id' => $this->faker->numberBetween(1, 20), // Create related package or use existing one,
            'photo' => $this->faker->imageUrl(640, 480, 'abstract'), // Generate a random image URL
        ];
    }
}
