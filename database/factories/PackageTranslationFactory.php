<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\PackageTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PackageTranslation>
 */
class PackageTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PackageTranslation::class;

    public function definition(): array
    {
        return [
            'package_id' => Package::factory(), // Create related package or use existing one
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'name' => $this->faker->sentence(3), // Random package name
            'description' => $this->faker->optional()->paragraph(), // Random description (optional)
        ];
    }
}
