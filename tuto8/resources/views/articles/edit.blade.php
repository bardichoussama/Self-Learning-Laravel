@extends('layouts.app')

@section('title', 'Modifier un Article')

@section('content')
    <h1>Modifier un Article</h1>

    <form action="{{ route('articles.update', $article) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" value="{{ old('title', $article->title) }}" required>
        </div>
        <div>
            <label for="content">Contenu :</label>
            <textarea name="content" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <button type="submit">Mettre à jour l'Article</button>
    </form>
@endsection
