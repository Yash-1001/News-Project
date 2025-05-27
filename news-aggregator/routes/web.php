
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SourceController;

// Main news page
Route::get('/', [NewsController::class, 'index'])->name('news.index');

// Category page
Route::get('/category/{id}', [NewsController::class, 'byCategory'])->name('news.category');

// Source page
Route::get('/source/{id}', [SourceController::class, 'bySource'])->name('news.source');

// Search page
Route::get('/search', [SearchController::class, 'search'])->name('news.search');