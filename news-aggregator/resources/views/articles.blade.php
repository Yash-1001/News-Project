
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Articles</h2>

    @if($articles->count())
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ Str::limit($article->description, 150) }}</p>
                            <a href="{{ $article->url }}" class="btn btn-primary" target="_blank">Read More</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y, h:i A') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $articles->links() }}
    @else
        <p>No articles found.</p>
    @endif
</div>
@endsection