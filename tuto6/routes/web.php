<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('index.show');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');


