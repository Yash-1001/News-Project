@extends('layouts.app')

@section('content')
    <h1>Latest News</h1>
    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $article->urlToImage }}" class="card-img-top" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->description, 100) }}</p>
                        <a href="{{ $article->url }}" target="_blank" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
