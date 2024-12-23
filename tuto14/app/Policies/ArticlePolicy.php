<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function create()
    {
        return true;
    }
    public function update(User $user, Article $article)
    {
        return $user->id === $article->user_id || $user->hasRole('admin');
    }
    public function delete(User $user, Article $article)
    {
        return $user->hasRole('admin');
    }
}
