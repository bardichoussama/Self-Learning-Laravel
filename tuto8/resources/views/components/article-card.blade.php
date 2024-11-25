<div class="article-card border rounded-lg p-4 shadow-sm">
    <h3 class="text-xl font-bold">
  
            {{ $article->title }}
 
    </h3>
    <p class="text-gray-700">{{ \Illuminate\Support\Str::limit($article->content, 100) }}</p>
    <a href="{{ route('articles.show', $article->id) }}" class="text-blue-500 hover:underline">
        Lire la suite
    </a>
</div>
