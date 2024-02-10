<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CMSTD') }}</title>
    @vite('resources/css/app.css')
</head>
<header>
    @yield('navbar')
</header>
<body>
    @yield('content')
</body>

<footer>
    @yield('footer')
</footer>
</html>
