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
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo">
                    </div>
                    <div class="text-xl font-bold"><a href="{{ route('home') }}">CMSTD</a></div>
                </div>
                <div class="flex space-x-4">
                    @if(Auth::check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-violet-500">Déconnexion</button>
                    </form>

                    <a href="{{ route('dashboard') }}" class="hover:text-violet-500">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="hover:text-violet-500">Se connecter</a>
                    <a href="{{ route('register') }}" class="hover:text-violet-500">S'enregistrer</a>
                    @endif
                    <a href="{{ route('contact') }}" class="hover:text-violet-500">Contact</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="mb-8 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">About Us</h3>
                    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="mb-8 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm hover:text-white">Home</a></li>
                        <li><a href="#" class="text-sm hover:text-white">About</a></li>
                        <li><a href="#" class="text-sm hover:text-white">Services</a></li>
                        <li><a href="#" class="text-sm hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="mb-8 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Connect With Us</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm hover:text-white flex items-center"><i
                                    class="fab fa-facebook mr-2"></i>Facebook</a></li>
                        <li><a href="#" class="text-sm hover:text-white flex items-center"><i
                                    class="fab fa-twitter mr-2"></i>Twitter</a></li>
                        <li><a href="#" class="text-sm hover:text-white flex items-center"><i
                                    class="fab fa-instagram mr-2"></i>Instagram</a></li>
                        <li><a href="#" class="text-sm hover:text-white flex items-center"><i
                                    class="fab fa-linkedin mr-2"></i>LinkedIn</a></li>
                    </ul>
                </div>
                <div class="mb-8 md:mb-0">
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <p class="text-sm">123 Street Name, City, Country<br>Email: example@example.com<br>Phone:
                        +1234567890</p>
                </div>
            </div>
            <hr class="border-gray-700 my-8">
            <div class="flex justify-between items-center">
                <p class="text-sm">&copy; 2024 Your Website. All rights reserved.</p>
                <ul class="flex space-x-4">
                    <li><a href="#" class="text-sm hover:text-white">Privacy Policy</a></li>
                    <li><a href="#" class="text-sm hover:text-white">Terms of Service</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>