<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 200),
            'rating' => fake()->numberBetween(1, 5),
            'title' => fake()->sentence($nbWords = 3, $variableNbWords = true),
            'content' => fake()->sentences($nb = 4, $asText = true),
        ];
    }
}
