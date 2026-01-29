<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'author_id' => fake()->randomElement(User::all()->pluck('id')->toArray()),
            'title' => fake()->sentence(15),
            'slug' => fake()->unique()->slug(),
            'content' => fake()->sentences(mt_rand(150, 200), asText: true),
            'thumbnail' => fake()->randomElement(['img/berita/berita-1.jpg', 'img/berita/berita-2.jpg', 'img/berita/berita-3.jpeg', 'img/berita/berita-4.jpeg']),
            'published' => fake()->randomElement([true, false]),
        ];
    }
}
