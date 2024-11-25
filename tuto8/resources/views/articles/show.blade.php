@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
    <a href="{{ route('articles.index') }}">Retour à la liste</a>
@endsection
