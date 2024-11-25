@extends('layouts.app')

@section('title', 'Liste des Articles')

@section('content')
    <h1>Liste des Articles</h1>
    <button>
        <a href="{{ route('articles.create') }}">Créer un nouvel article</a>
    </button>

    <ul>
        @foreach ($articles as $article)
            <li>
                <p>Titre :</p>
                <a href="{{ route('articles.show', $article) }}"> {{ $article->title }}</a>
                <button>
                <a href="{{ route('articles.edit', $article) }}">Modifier</a>
                </button>

                <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                        Supprimer
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
