<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words($nb = 3, $asText = true),
            'description' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'price' => fake()->numberBetween(5, 5000)/10.0,
        ];
    }
}
