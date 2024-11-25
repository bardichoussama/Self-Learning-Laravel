@extends('layouts.app')

@section('title', 'Liste des Articles')

@section('content')
@include('partials.flash-message')
    <div class="my-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Liste des Articles</h1>

        <div class="mb-4">
            <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Créer un nouvel article
            </a>
        </div>

        <ul class="space-y-4">
            @foreach ($articles as $article)
                <li class="p-4 bg-white rounded shadow-md">
                  
                    <x-article-card :article="$article" />

               
                    <div class="flex space-x-4 mt-2">
                        <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-500 hover:underline">
                            Modifier
                        </a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')" 
                                class="text-red-500 hover:underline"
                            >
                                Supprimer
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
