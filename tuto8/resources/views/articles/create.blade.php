@extends('layouts.app')

@section('title', 'Créer un Nouvel Article')

@section('content')
    <h1>Créer un Nouvel Article</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="content">Contenu :</label>
            <textarea name="content" required>{{ old('content') }}</textarea>
        </div>

        <button type="submit">Ajouter Article</button>
    </form>
@endsection
