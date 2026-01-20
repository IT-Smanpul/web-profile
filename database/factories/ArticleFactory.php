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
            'thumbnail' => fake()->randomElement(['img/free-blog-1.png', 'img/free-blog-2.png', 'img/free-blog-3.png', 'img/berita-1.jpg', 'img/berita-2.jpg', 'img/berita-3.jpeg', 'img/berita-4.jpeg', 'img/prestasi-1.jpg', 'img/prestasi-2.jpg', 'img/prestasi-3.jpg']),
            'published' => fake()->randomElement([true, false]),
        ];
    }
}
