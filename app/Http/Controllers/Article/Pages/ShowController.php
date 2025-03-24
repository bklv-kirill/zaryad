<?php

declare(strict_types=1);

namespace App\Http\Controllers\Article\Pages;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\Article\ArticleRepository;
use App\Interfaces\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __construct(
        private readonly ArticleRepository  $articleRepository,
        private readonly CategoryRepository $categoryRepository,
    )
    {
    }

    public function __invoke(Request $request, string $categorySlug, string $articleSlug): View
    {
        $category = $this->categoryRepository
            ->getBySlug($categorySlug);

        abort_if(is_null($category), Response::HTTP_NOT_FOUND);

        $article = $this->articleRepository
            ->getBySlug($articleSlug);

        $categories = $this->categoryRepository
            ->getForArticle($article->id);

        return view('article.pages.show')
            ->with('article', $article)
            ->with('categories', $categories);
    }
}
