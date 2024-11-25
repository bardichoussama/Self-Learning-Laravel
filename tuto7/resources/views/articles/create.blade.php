@extends('layouts.app')

@section('content')
    <h1>Créer un Article</h1>
    <form action="{{ route('store.article') }}" method="POST">
        @csrf
        <label for="title">Titre :</label>
        <input type="text" name="title" value="{{ old('title') }}" required>

        <label for="content">Contenu :</label>
        <textarea name="content" required>{{ old('content') }}</textarea>

        <button type="submit">Créer</button>
    </form>
@endsection
