<?php

declare(strict_types=1);

namespace App\DTOs\Category;

final class CategoryDTO
{
    public function __construct(
        public string  $title,
        public string  $slug,
        public ?int    $id = null,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
    )
    {
    }
}
