<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\Package_service;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package_service>
 */
class Package_serviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Package_service::class;

    public function definition(): array
    {
        return [
            'package_id' => Package::factory(), // Create related package or use existing one
            'tour_id' => Tour::factory(), // Create related tour or use existing one
        ];
    }
}
