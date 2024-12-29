@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($articles as $article )
            <div
            class="block rounded-lg border bg-white p-6 text-surface shadow-secondary-1 mx-32  ">
            <h5 class="mb-2 text-xl font-medium leading-tight">{{ $article->title}}</h5>
            <p class="mb-4 text-base">
             {{ $article->content}}
            </p>
            
          </div>
                
            @endforeach

        </div>
    </div>
</div>
@endsection
