<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->nom }}</title>
    @vite('resources/css/app.css')
</head>

<header>
    @include('templates.navbar.' . $site->pathNavbar)
    @yield('navbar')
</header>
<body>
    <div class="container">
        @foreach ($page->blocs as $bloc)
            @include('templates.utils.' . $bloc->type, ['bloc' => $bloc])
            @yield("{$bloc->type}_{$bloc->idBloc}")
        @endforeach
    </div>
</body>

<footer>
    @include('templates.footer.' . $site->pathFooter)
    @yield('footer')
</html>
