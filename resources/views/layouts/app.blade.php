<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CMSTD') }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header>
        <nav class="navbar fixed top-0 w-full p-4">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center">
                    <div class="w-16">
                        <img src="{{ asset('css/logo.png') }}" alt="Logo">
                    </div>
                    <div class="text-xl font-bold"><a href="{{ route('home') }}">CMSTD</a></div>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="hover:text-violet-500">Se connecter</a>
                    <a href="{{ route('contact') }}" class="hover:text-violet-500">Contact</a>
                </div>
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