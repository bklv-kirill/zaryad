<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait Imageable
{
    private const SOURCE_URL = 'https://cataas.com/cat';
    private const DEFAULT_IMAGE_URL = '';

    public function getRandomImages(int $limit = 3): array
    {
       $images = [];

       for ($i = 1; $i <= $limit; $i++) {
           $images[] = $this->getRandomImage();
       }

       return $images;
    }

    public function getRandomImage(): string
    {
        $response = Http::acceptJson()->get(self::SOURCE_URL);

        if ($response->failed()) {
            return self::DEFAULT_IMAGE_URL;
        }

        $responseData = $response->json();

        return $responseData['url'];
    }
}
