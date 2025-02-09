<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tour::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'destination_id' => Destination::factory(), // Create related destination or use existing one
            'category_id' => Category::factory(), // Create related category or use existing one
            'price' => $this->faker->randomFloat(2, 10, 1000), // Generates a price with 2 decimal places between 10 and 1000
            'duration' => $this->faker->numberBetween(1, 10), // Random duration between 1 and 10
            'duration_type' => $this->faker->randomElement(['hours', 'days']), // Random duration type
            'rating' => $this->faker->randomFloat(2, 0, 5), // Random rating between 0 and 5
            'available' => $this->faker->boolean(), // Random boolean for availability
            'additional_info' => $this->faker->text(), // Random additional information
            'max_tickets_per_day' => $this->faker->numberBetween(1, 100), // Random max tickets per day
            'longitude' => $this->faker->longitude(), // Random longitude
            'latitude' => $this->faker->latitude(), // Random latitude
            'count' => $this->faker->numberBetween(0, 50), // Random reservation count
            'pin' => $this->faker->boolean(), // Random boolean for pinning the tour
        ];
    }
}
