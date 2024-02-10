<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'client') }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        @yield('navbar')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @yield('footer')
    </footer>
</body>
</html>