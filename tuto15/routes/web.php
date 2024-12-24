<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::get('/test-comments', function () {

    $tag = Tag::create(['name' => 'Laravel']);


    $comment = $tag->comments()->create([
        'content' => 'Great tag for Laravel!',
       
    ]);

 
    $latestComments = $tag->comments()->latest()->get();

    return response()->json([
        'tag' => $tag,
        'comments' => $latestComments,
    ]);
});

Route::get('/user-comments/{userId}', function ($userId) {
   
    $comments = Comment::whereHasMorph('commentable', ['App\Models\Article'], function ($query) use ($userId) {
        $query->where('user_id', $userId); 
    })->get();

    return response()->json($comments);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['permission:view dashboard']);

Auth::routes();
Route::get('/admin/dashboard', [AdminController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\ArticleController::class, 'index']);
Route::middleware(['permission:view dashboard'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Bienvenue sur le tableau de bord.';
    });
});


