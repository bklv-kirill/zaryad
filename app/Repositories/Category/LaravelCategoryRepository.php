<?php

declare(strict_types=1);

namespace App\Repositories\Category;

use App\DTOs\Category\CategoryDTO;
use App\Interfaces\Repositories\Category\CategoryRepository;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

final class LaravelCategoryRepository implements CategoryRepository
{
    public function getBySlug(string $slug): ?CategoryDTO
    {
        $category = Category::query()
            ->firstWhere('slug', $slug);

        if (is_null($category)) {
            return null;
        }

        return new CategoryDTO(
            title: $category->title,
            slug: $category->slug,
            id: $category->id,
            createdAt: $category->created_at->format('d.m.Y H:i'),
            updatedAt: $category->updated_at->format('d.m.Y H:i'),
        );
    }

    public function getForArticle(int $articleId): array
    {
        $categories = Category::query()
            ->whereHas('articles', function (Builder $builder) use ($articleId) {
                $builder->where('article_id', $articleId);
            })
            ->get();

        $result = [];

        foreach ($categories as $category) {
            $result[] = new CategoryDTO(
                title: $category->title,
                slug: $category->slug,
                id: $category->id,
                createdAt: $category->created_at->format('d.m.Y H:i'),
                updatedAt: $category->updated_at->format('d.m.Y H:i'),
            );
        }

        return $result;
    }
}
