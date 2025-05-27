<!DOCTYPE html>
<html>
<head>
    <title>Laravel News Aggregator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">News Aggregator</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="bg-light text-center py-3 mt-4">
        <p>&copy; {{ date('Y') }} Laravel News Aggregator</p>
    </footer>
</body>
</html>
