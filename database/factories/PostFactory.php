<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->realText(50);
        return [
            'name' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'main_photo' => fake()->imageUrl(),
            'content' => fake()->realText(5000),
            'status' => fake()->boolean,
            'published_at' => fake()->dateTime,
            'admin_id' => 1
        ];
    }
}
