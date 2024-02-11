<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site->nom }}</title>
    @vite('resources/css/app.css')
</head>
<body style="background-color: {{ $site->couleur }};">
    <header>
        @include('templates.navbar.' . $site->pathNavbar)
        @yield('navbar')
    </header>

    <main>
        @include('templates.main.' . $site->pathBody)
        @yield('content')
    </main>

    <footer>
        @include('templates.footer.' . $site->pathFooter)
        @yield('footer')
    </footer>
</body>
</html>
