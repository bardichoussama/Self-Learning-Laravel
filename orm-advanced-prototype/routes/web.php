<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/article/index',[ ArticleController::class,'index'])->name('article.index');
Route::get('/article/create',[ ArticleController::class,'create'])->name('article.create');
Route::post('/article',[ ArticleController::class,'store'])->name('article.store');
Route::delete('/article/{article}',[ ArticleController::class,'destroy'])->name('article.destroy');



