<!DOCTYPE html>
<html>
    <head>
        <title>Liste des Articles</title>
    </head>
    <body>
        <h1>Liste des Articles</h1>
        <ul>
           
            {{-- @dd($articles) --}}
            @foreach ($articles as $article)
            <li>
                <a href="{{ route('articles.show', ['id' => $article['id']]) }}">{{ $article['title'] }}</a>
            </li>
        @endforeach
        
        </ul>
    </body>
</html>
