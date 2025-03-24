<?php

declare(strict_types=1);

namespace App\Repositories\Article;

use App\DTOs\Article\ArticleDTO;
use App\Interfaces\Repositories\Article\ArticleRepository;
use App\Models\Article;

final class LaravelArticleRepository implements ArticleRepository
{
    public function getBySlug(string $slug): ?ArticleDTO
    {
        $article = Article::query()
            ->firstWhere('slug', $slug);

        if (is_null($article)) {
            return null;
        }

        return new ArticleDTO(
            title: $article->title,
            slug: $article->slug,
            content: $article->content,
            id: $article->id,
            createdAt: $article->created_at->format('d.m.Y H:i'),
            updatedAt: $article->updated_at->format('d.m.Y H:i'),
        );
    }

    public function paginate(int $perPage, int $page): array
    {
        $articles = Article::query()
            ->paginate($perPage, page: $page);

        $result = [];
        foreach ($articles as $article) {
            $result[] = new ArticleDTO(
                title: $article->title,
                slug: $article->slug,
                content: $article->content,
                id: $article->id,
                createdAt: $article->created_at->format('d.m.Y H:i'),
                updatedAt: $article->updated_at->format('d.m.Y H:i'),
            );
        }
        return $result;
    }
}
