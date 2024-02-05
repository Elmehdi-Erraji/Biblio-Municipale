<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'genre' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'published_at' => $this->faker->date,
            'totalCopies' => $this->faker->randomNumber(2),
            'availableCopies' => $this->faker->randomNumber(1),
            'image' => 'placeholder_image.jpg',
        ];
    }
}
