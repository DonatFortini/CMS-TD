<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CMSTD') }}</title>
    @vite('resources/js/app.js')
</head>
<body>
    <header>
        <nav>
            <div>
                <a id="navbarTitle" href="{{ route('home') }}">{{ config('app.name', 'CMSTD') }}</a>
            </div>
            <div>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('connect') }}">Connect</a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        footer
    </footer>
</body>
</html>
