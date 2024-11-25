<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticleCard extends Component
{
    public $article; // Declare the public property

    /**
     * Create a new component instance.
     */
    public function __construct($article)
    {
        $this->article = $article; // Assign the article
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article-card');
    }
}

