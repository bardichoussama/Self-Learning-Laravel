<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;
Route::get('/set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('set-locale');

Route::get('/', function () {
    return view('welcome');
});
