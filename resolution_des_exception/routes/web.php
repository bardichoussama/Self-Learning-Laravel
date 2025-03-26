<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article/create', [ArticleController::class, 'create']); 
Route::post('/article/store', [ArticleController::class, 'store']);
