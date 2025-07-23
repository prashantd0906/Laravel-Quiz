<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Quiz App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('/') }}">@yield('title', 'Laravel Quiz App')</a>

            <div class="d-flex ms-auto">
                @if(Auth::check())
                    <span class="navbar-text text-white me-3">
                        Welcome, {{ Auth::user()->name }}!
                    </span>
                    <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Logout</a>
                @endif
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        <x-alert />
        @yield('content')
    </main>

</body>
</html>
