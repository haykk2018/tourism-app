<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->word,
            'keywords' => fake()->words(4, true),
            'meta_description' => fake()->realText(rand(10, 50)),
            'menu_name' => fake()->unique()->words(2, true),
            'description' => fake()->realText(rand(10, 50)),
            'content' => fake()->realText(rand(10, 350)),
            'img_src' => fake()->imageUrl,
            'img_alt' => fake()->sentence,
        ];
    }
}
