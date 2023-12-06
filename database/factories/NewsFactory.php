<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::factory()->create();
        return [
            'title' => $this->faker->name(),
            'content' => $this->faker->paragraphs(rand(3, 6), true),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,

        ];
    }
}
