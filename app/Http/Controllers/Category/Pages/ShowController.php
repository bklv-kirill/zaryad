<?php

declare(strict_types=1);

namespace App\Http\Controllers\Category\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(Request $request, string $categorySlug): View
    {
        $category = Category::query()
            ->whereSlug($categorySlug)
            ->firstOrFail();

        $page = $request->input('page', 1);
        $articles = $category->articles()->paginate(5, page: $page);

        abort_if($articles->isEmpty(), 404);

        return view('category.pages.show')
            ->with('category', $category)
            ->with('articles', $articles);
    }
}
