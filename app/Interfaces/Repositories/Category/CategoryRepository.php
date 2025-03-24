<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories\Category;

use App\DTOs\Category\CategoryDTO;

interface CategoryRepository
{
    public function getBySlug(string $slug): ?CategoryDTO;

    public function getForArticle(int $articleId): array;
}
