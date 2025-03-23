<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()
            ->count(5)
            ->create();

        Article::factory()
            ->count(10)
            ->create();

        Article::query()->get()->each(function (Article $article) {
            $categoriesIds = Category::query()
                ->inRandomOrder()
                ->limit(3)
                ->get()
                ->pluck('id')
                ->toArray();

            $article->categories()->attach($categoriesIds);
        });
    }
}
