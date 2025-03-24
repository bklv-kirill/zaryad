<?php

declare(strict_types=1);

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\Article\ArticleRepository;
use App\Interfaces\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainPageController extends Controller
{
    public function __construct(
        private readonly ArticleRepository  $articleRepository,
        private readonly CategoryRepository $categoryRepository,
    )
    {
    }

    public function __invoke(Request $request): View
    {
        $page = (int)$request->input('page', 1);
        $articles = $this->articleRepository
            ->paginate(12, $page);

        $categories = [];
        foreach ($articles as $article) {
            $categories[$article->id] = $this->categoryRepository
                ->getForArticle($article->id);
        }

        return view('pages.main')
            ->with('articles', $articles)
            ->with('cats', $categories);
    }
}
