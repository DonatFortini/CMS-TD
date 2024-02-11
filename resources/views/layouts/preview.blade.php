<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CMSTD') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/preview.js')
</head>

<body class="w-full h-full flex flex-col">
    <header>
        <nav class="navbar top-0 w-full p-4 bg-gray-100">
            <div class="container mx-auto flex flex-wrap justify-between items-center">
                <div class="flex items-center flex-shrink-0">
                    <div class="w-16">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo">
                    </div>
                    <div class="text-xl font-bold ml-4"><a href="{{ route('home') }}">CMSTD</a></div>
                </div>
                <form method="POST" action="{{ route('backOffice.addSite') }}">
                    @csrf
                    <div class="w-full md:flex md:items-center md:w-auto">
                        <div class="md:flex-grow">
                            <div class="text-sm flex flex-col md:flex-row md:justify-end mt-4 md:mt-0">
                                <div class="md:flex items-center">
                                    <input type="text" name="site_name" placeholder="Nom du Site" class="mb-2 md:mb-0 md:mr-2 p-1 border border-gray-300 rounded">
                                    <div class="flex flex-wrap items-center justify-between space-x-2 md:space-x-4">
                                        <div class="flex items-center mb-2 md:mb-0">
                                            <label for="navbar-select" class="mr-2">Navbar Template:</label>
                                            <select id="navbar-select" name="navbar_template" class="p-1 border border-gray-300 rounded">
                                                <!-- Options pour la barre de navigation -->
                                                <?php
                                                    $navbarOptions = ['burger', 'classic', 'vertical'];
                                                    $selectedNavbar = $_GET["navbar"] ?? '';
                                                    foreach ($navbarOptions as $option) {
                                                        $selected = $selectedNavbar === $option ? 'selected' : '';
                                                        echo "<option value=\"$option\" $selected>$option</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="flex items-center mb-2 md:mb-0">
                                            <label for="main-select" class="mr-2">Main Template:</label>
                                            <select id="main-select" name="main_template" class="p-1 border border-gray-300 rounded">
                                                <!-- Options pour le template principal -->
                                                <?php
                                                    $mainOptions = ['complex', 'modern', 'simple'];
                                                    $selectedMain = $_GET["main"] ?? '';
                                                    foreach ($mainOptions as $option) {
                                                        $selected = $selectedMain === $option ? 'selected' : '';
                                                        echo "<option value=\"$option\" $selected>$option</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="flex items-center mb-2 md:mb-0">
                                            <label for="footer-select" class="mr-2">Footer Template:</label>
                                            <select id="footer-select" name="footer_template" class="p-1 border border-gray-300 rounded">
                                                <!-- Options pour le template de pied de page -->
                                                <?php
                                                    $footerOptions = ['complex', 'modern', 'simple'];
                                                    $selectedFooter = $_GET["footer"] ?? '';
                                                    foreach ($footerOptions as $option) {
                                                        $selected = $selectedFooter === $option ? 'selected' : '';
                                                        echo "<option value=\"$option\" $selected>$option</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="flex items-center mb-2 md:mb-0">
                                            <label for="color-picker" class="mr-2">Main Color:</label>
                                            <input type="color" name="color" id="color-picker" class="p-1 rounded-full">
                                        </div>

                                        <div class="flex items-center mb-2 md:mb-0">
                                            <label for="font-select" class="mr-2">Font:</label>
                                            <select id="font-select" name="font" class="p-1 border border-gray-300 rounded">
                                                <!-- Options pour la police d'écriture -->
                                                <?php
                                                    $fontOptions = ['Arial', 'Helvetica', 'Verdana', 'Georgia', 'Times New Roman', 'Trebuchet MS', 'Arial Black', 'Impact', 'Comic Sans MS', 'Courier New', 'Lucida Console'];
                                                    $selectedFont = $_GET["font"] ?? '';
                                                    foreach ($fontOptions as $option) {
                                                        $selected = $selectedFont === $option ? 'selected' : '';
                                                        echo "<option value=\"$option\" $selected>$option</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="flex items-center mb-2 md:mb-0">
                                            <label for="text-color-picker" class="mr-2">Text Color:</label>
                                            <input type="color" name="text_color" id="font-color-picker" class="p-1 rounded-full">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="md:ml-4 p-2 w-full md:w-auto bg-blue-500 text-white rounded shadow-lg">Créer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
    </header>

    <div class="bg-slate-500 w-full flex justify-center items-center" style="min-height:90vh;">
        <div id="playground" class="bg-slate-200 w-full md:w-4/5 xl:w-3/4 2xl:w-2/3 max-h-95% overflow-auto p-4">
            <div id="orientation" class="flex">
                @yield('navbar')
                <div id="topSeparator"></div>
                @yield('content')
            </div>
            <div id="bottomSeparator"></div>
            @yield('footer')
        </div>
    </div>

</body>

</html>
