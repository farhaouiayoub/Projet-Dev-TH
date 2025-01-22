<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\article>
 */
class articleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence();
        $content = fake()->paragraphs(asText:true);
        $created_at = fake()->dateTimeBetween('-1 year');

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => str::limit($content, 150),
            'content' => $content,
            'status' => fake()->randomElement(['Refus', 'En cours', 'Retenu', 'Publié']),
            'image' => fake()->randomElement(['https://picsum.photos/1050/300']),
            'created_at' => $created_at,
            'updated_at' => $created_at,

        ];
    }
}
