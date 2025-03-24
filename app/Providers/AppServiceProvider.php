<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bindIf(
            abstract: \App\Interfaces\Repositories\Category\CategoryRepository::class,
            concrete: \App\Repositories\Category\LaravelCategoryRepository::class);
        $this->app->bindIf(
            abstract: \App\Interfaces\Repositories\Article\ArticleRepository::class,
            concrete: \App\Repositories\Article\LaravelArticleRepository::class,
        );
    }

    public function boot(): void
    {
    }
}
