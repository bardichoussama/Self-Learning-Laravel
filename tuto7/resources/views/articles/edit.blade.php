@extends('layouts.app')

@section('content')
 
    <form action="{{ route('update.article', $article['id']) }}" method="POST">
        @csrf
        @method('put')
        <label for="title">Titre :</label>
        <input type="text" name="title" value="{{$article['title']}}" required>
        <label for="content">Contenu :</label>
        <textarea name="content" required>{{$article['content']}}</textarea>
        <button type="submit">Edit</button>
    </form>
@endsection
