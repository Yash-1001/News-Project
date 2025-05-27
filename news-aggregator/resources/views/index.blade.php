@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Latest News</h2>

    {{-- Category Filter --}}
    <div class="mb-4">
        <strong>Categories:</strong>
        @foreach($categories as $category)
            <a href="{{ url('/category/' . $category->id) }}" class="btn btn-sm btn-outline-primary m-1">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    {{-- Articles --}}
    <div class="row">
        <form action="{{ route('news.search') }}" method="GET" class="mb-4">
    <input type="text" name="query" class="form-control" placeholder="Search news..." value="{{ request('query') }}">
</form>

        @forelse($articles as $article)
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
        @empty
            <p>No articles found.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $articles->links() }}
    </div>
</div>
@endsection
