<?php

use Sandex\Marketing\Presentation\Api\Controllers\ProductController;
use Sandex\Marketing\Presentation\Html\Controllers\ProductController as ProductHtmlController;

Route::group(['middleware' => 'web'], function () {
    Route::get('/products', [ProductHtmlController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductHtmlController::class, 'create'])->name('products.create');
    Route::get('/products/{product}', [ProductHtmlController::class, 'show'])->name('products.show');
    Route::post('/products', [ProductHtmlController::class, 'store'])->name('products.store');
});

 Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {
        Route::get('/products', [ProductController::class, 'index'])->name('api.products.index');
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('api.products.show');
        Route::post('/products', [ProductController::class, 'store'])->name('api.products.store');
 });
