@extends('layouts.app')

@section('title', 'Bienvenue')

@section('content')
    <h1>Bienvenue sur le Blog</h1>
    <button>
        <a href="{{ route('articles.index') }}">Voir Tous Les Articles</a>
    </button>
@endsection
