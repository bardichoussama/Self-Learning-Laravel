<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/article/index',[ ArticleController::class,'index'])->middleware('role:admin')->name('article.index');
Route::get('/article/create',[ ArticleController::class,'create'])->middleware('role:admin')->name('article.create');
Route::post('/article',[ ArticleController::class,'store'])->middleware('role:admin')->name('article.store');
Route::delete('/article/{article}',[ ArticleController::class,'destroy'])->middleware('role:admin')->name('article.destroy');



