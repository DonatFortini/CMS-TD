<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site->nom }}</title>
    @vite('resources/css/app.css')
    @vite('resources/css/siteView.css')
</head>
<body style="background-color: {{ $site->couleurBackground }}; color: {{ $site->couleurPolicy }}; font-family: {{ $site->fontPolicy }}; ">
    <div name="orientation" class="{{ $orientation }}">
        @include('templates.navbar.' . $site->pathNavbar)
        @yield('navbar')
        @include('templates.main.' . $site->pathBody)
        @yield('content') 
    </div>
    @include('templates.footer.' . $site->pathFooter)
    @yield('footer')
</body>
</html>
