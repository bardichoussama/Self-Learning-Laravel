<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    /**
     * Handle the form submission and add the article to the database.
     */
    public function store(Request $request)
    {
        // Create a new Article object
        $article = new Article();
        
        // Fill in data from the form submission
        $article->title = $request->input('title');
        $article->content = $request->input('content');

        // Save to the database
        $article->save();

        return "Article added successfully!";
    }
}
