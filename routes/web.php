<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Pages\MainPageController::class)->name('main');

Route::name('category.')->group(function () {
    Route::get('/posts/{categorySlug}/', \App\Http\Controllers\Category\Pages\ShowController::class)->name('show');
});

Route::name('article.')->group(function () {
    Route::get('/posts/{categorySlug}/{articleSlug}', \App\Http\Controllers\Article\Pages\ShowController::class)->name('show');
});
