<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;


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
})->middleware('role:user');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\ArticleController::class, 'index']);


