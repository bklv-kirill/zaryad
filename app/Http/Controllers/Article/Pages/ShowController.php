<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(Request $request, string $categorySlug, string $articleSlug): View
    {
        $category = Category::query()
            ->whereSlug($categorySlug)
            ->firstOrFail();

        $article = $category->articles()
            ->whereSlug($articleSlug)
            ->firstOrFail();

        return view('article.pages.show')
            ->with('article', $article);
    }
}
