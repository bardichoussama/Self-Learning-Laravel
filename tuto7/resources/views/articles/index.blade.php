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
               
                <a href="">{{ $article['title'] }}</a>
               
                <form action="/articles/{{ $article['id'] }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
        
        </ul>
    </body>
</html>
