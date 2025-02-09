<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(); // Generate a unique title for each category
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'photo' => $this->faker->imageUrl(800, 600, 'categories', true, 'category'), // Random category photo URL
        ];
    }
}
