<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\Package_translation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package_translation>
 */
class Package_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Package_translation::class;

    public function definition(): array
    {
        return [
            'package_id' => Package::factory(), // Create related package or use existing one
            'locale' => $this->faker->locale, // Random locale
            'name' => $this->faker->sentence(3), // Random package name
            'description' => $this->faker->optional()->paragraph(), // Random description (optional)
        ];
    }
}
