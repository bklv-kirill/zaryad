<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        $title = str($this->faker->unique()->words(5, true))->ucfirst();
        $slug = str($title)->slug();
        $content = $this->faker->paragraph(8);
        $date = $this->faker->date();

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
