<?php

declare(strict_types=1);

namespace App\Http\Controllers\Category\Pages;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\Article\ArticleRepository;
use App\Interfaces\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository,
        private readonly ArticleRepository  $articleRepository,
    )
    {
    }

    public function __invoke(Request $request, string $categorySlug): View
    {
        $category = $this->categoryRepository
            ->getBySlug($categorySlug);

        abort_if(is_null($category), Response::HTTP_NOT_FOUND);

        $page = (int)$request->input('page', 1);
        $articles = $this->articleRepository
            ->paginate(6, $page);

        abort_if(empty($articles), Response::HTTP_NOT_FOUND);

        return view('category.pages.show')
            ->with('category', $category)
            ->with('articles', $articles);
    }
}
