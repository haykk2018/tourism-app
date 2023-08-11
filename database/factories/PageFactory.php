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
            'title'=> fake()->word,
            'short_description'=>fake()->realText(rand(10,50)),
            'description'=>fake()->realText(rand(10,150)),
            'img_src'=>fake()->imageUrl        ];
    }
}
