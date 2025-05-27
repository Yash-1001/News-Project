<!DOCTYPE html>
<html>
<head>
    <title>News Aggregator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Latest News</h1>

    <div class="mb-3">
        <strong>Categories:</strong>
        @foreach($categories as $category)
            <a href="{{ route('news.category', $category->id) }}" class="btn btn-sm btn-outline-primary">{{ $category->name }}</a>
        @endforeach
    </div>

    @foreach($articles as $article)
        <div class="card mb-3">
            <div class="row g-0">
                @if($article->urlToImage)
                <div class="col-md-4">
                    <img src="{{ $article->urlToImage }}" class="img-fluid rounded-start" alt="image">
                </div>
                @endif
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <a href="{{ $article->url }}" target="_blank" class="btn btn-sm btn-primary">Read more</a>
                        <p class="card-text"><small class="text-muted">By {{ $article->author }} | {{ \Carbon\Carbon::parse($article->publishedAt)->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
</div>
</body>
</html>
