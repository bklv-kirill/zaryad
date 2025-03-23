<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        $title = str($this->faker->unique()->word())->ucfirst();
        $slug = str($title)->slug();
        $content = $this->faker->paragraph(5);

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
        ];
    }
}
