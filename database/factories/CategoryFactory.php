<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $title = str($this->faker->unique()->word())->ucfirst();
        $slug = str($title)->slug();

        return [
            'title' => $title,
            'slug' => $slug,
        ];
    }
}
