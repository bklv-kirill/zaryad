<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories\Article;

use App\DTOs\Article\ArticleDTO;

interface ArticleRepository
{
    public function getBySlug(string $slug): ?ArticleDTO;

    public function paginate(int $perPage, int $page): array;
}
