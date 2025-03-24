<?php

declare(strict_types=1);

namespace App\Services\RandomImage;

use App\Interfaces\Services\RandomImage\RandomImageService;
use Illuminate\Support\Facades\Http;

class RandomCatImageService implements RandomImageService
{
    public function getRandomImages(int $count = 3): array
    {
        $images = [];

        for ($i = 1; $i <= $count; $i++) {
            $images[] = $this->getRandomImage();
        }

        return $images;
    }

    public function getRandomImage(): string
    {
        $defaultImageUrl = env('DEFAULT_IMAGE_URL');

        if (env('DYNAMIC_IMAGES') === false) {
            return $defaultImageUrl;
        }

        $response = Http::acceptJson()
            ->get(env('RANDOM_IMAGE_SOURCE_URL'));

        if ($response->failed()) {
            return $defaultImageUrl;
        }

        $responseData = $response->json();

        return $responseData['url'];
    }
}
