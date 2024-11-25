<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('index.show');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('create.show');
Route::post('/articles', [ArticleController::class, 'store'])->name('store.article');

Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('edit.show');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('update.article');  
Route::delete('/articles/{id}', [ArticleController::class,'destroy'])->name('delete.article');



