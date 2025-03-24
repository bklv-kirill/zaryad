<?php

declare(strict_types=1);

namespace App\Interfaces\Services\RandomImage;

interface RandomImageService
{
    public function getRandomImages(int $count = 3): array;

    public function getRandomImage(): string;
}
