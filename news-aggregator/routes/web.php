<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/category/{id}', [NewsController::class, 'byCategory'])->name('news.category');

Route::get('/', function () {
    return view('welcome');
});
