<?php

declare(strict_types=1);

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainPageController extends Controller
{
    public function __invoke(Request $request): View
    {
        $page = $request->input('page', 1);
        $articles = Article::query()
            ->latest()
            ->paginate(12, page: $page);

        return view('pages.main')
            ->with('articles', $articles);
    }
}
