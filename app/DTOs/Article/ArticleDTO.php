<?php

declare(strict_types=1);

namespace App\DTOs\Article;

final class ArticleDTO
{
    public function __construct(
        public string  $title,
        public string  $slug,
        public string  $content,
        public ?int    $id = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
    )
    {
    }
}
