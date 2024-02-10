<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CMSTD') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/preview.js')
</head>

<body class="w-full h-full flex-col">
    <header>
        <nav class="navbar top-0 w-full p-4" style="height:10vh;">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center">
                    <div class="w-16">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo">
                    </div>
                    <div class="text-xl font-bold"><a href="{{ route('home') }}">CMSTD</a></div>
                </div>
                <div class="flex space-x-4">
                    <label for="navbar-select" class="mr-1">Navbar Template:</label> <!-- Reduced margin-right -->
                    <select id="navbar-select" class="mr-2">
                        <?php
                            $navbarOptions = ['burger', 'classic', 'modern'];
                            $selectedNavbar = $_GET["navbar"] ?? '';
                            foreach ($navbarOptions as $option) {
                                $selected = $selectedNavbar === $option ? 'selected' : '';
                                echo "<option value=\"$option\" $selected>$option</option>";
                            }
                            ?>
                    </select>
                    <label for="main-select" class="mr-1">Main Template:</label> <!-- Reduced margin-right -->
                    <select id="main-select" class="mr-2">
                        <?php
                            $mainOptions = ['complex', 'modern', 'simple'];
                            $selectedMain = $_GET["main"] ?? '';
                            foreach ($mainOptions as $option) {
                                $selected = $selectedMain === $option ? 'selected' : '';
                                echo "<option value=\"$option\" $selected>$option</option>";
                            }
                            ?>
                    </select>
                    <label for="footer-select" class="mr-1">Footer Template:</label> <!-- Reduced margin-right -->
                    <select id="footer-select" class="mr-2">
                        <?php
                            $footerOptions = ['complex', 'modern', 'simple'];
                            $selectedFooter = $_GET["footer"] ?? '';
                            foreach ($footerOptions as $option) {
                                $selected = $selectedFooter === $option ? 'selected' : '';
                                echo "<option value=\"$option\" $selected>$option</option>";
                            }
                            ?>
                    </select>
                    <label for="color-picker" class="mr-1">Main Color:</label> <!-- Reduced margin-right -->
                    <input type="color" id="color-picker">
                </div>
            </div>
            </div>
        </nav>
    </header>

    <div class="bg-slate-500 w-screen flex justify-center items-center" style="height:90vh;">
        <div id="playground" class="bg-slate-200" style="width:80vw; max-height:95%; overflow:auto;">
            @yield('navbar')
            @yield('content')
            @yield('footer')
        </div>
    </div>

</body>

</html>