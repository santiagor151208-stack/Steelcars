<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

// Redirigir raíz al panel de admin
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/products', [PublicController::class, 'products'])->name('products');
Route::get('/product/{slug}', [PublicController::class, 'productDetail'])->name('product.detail');
Route::get('/categories', [PublicController::class, 'categories'])->name('categories');
Route::get('/category/{slug}', [PublicController::class, 'categoryProducts'])->name('category.products');
Route::get('/brands', [PublicController::class, 'brands'])->name('brands');
Route::get('/brand/{slug}', [PublicController::class, 'brandProducts'])->name('brand.products');
Route::get('/search', [PublicController::class, 'search'])->name('search');