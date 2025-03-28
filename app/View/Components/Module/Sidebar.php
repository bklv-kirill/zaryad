<?php

declare(strict_types=1);

namespace App\View\Components\Module;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public Collection $articles;

    public function __construct()
    {
        $this->articles = Article::query()
            ->inRandomOrder()
            ->limit(3)
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.module.sidebar');
    }
}
