<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Category_translation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category_translation>
 */
class Category_translationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category_translation::class;

    public function definition(): array
    {
        return [
            'category_id' => Category::factory(), // Create related category or use existing one
            'locale' => $this->faker->randomElement(['en', 'fr', 'es', 'de', 'ar']), // Random locale code
            'name' => $this->faker->word(), // Random name for category
            'description' => $this->faker->paragraph(), // Random description for the category
        ];
    }
}
