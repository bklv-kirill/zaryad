<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        View::composer('*', function (\Illuminate\View\View $view) {
            $categories = Category::query()
                ->latest()
                ->get();

            $view->with('categories', $categories);
        });

        Paginator::useBootstrap();

        Blade::component(\App\View\Components\Layout\Main::class, 'layout-main');

        Blade::component(\App\View\Components\Header\Main::class, 'header-main');

        Blade::component(\App\View\Components\Footer\Main::class, 'footer-main');

        Blade::component(\App\View\Components\Module\Loader::class, 'loader');
        Blade::component(\App\View\Components\Module\Sidebar::class, 'sidebar');
        Blade::component(\App\View\Components\Module\Articles::class, 'articles');
    }
}
