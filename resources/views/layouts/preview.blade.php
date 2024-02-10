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
        <nav class="navbar w-full p-4 " style="height:10vh">
            <div id="content" class="flex flex-col items-center p-6">
                <!-- Template Selection -->
                <div class="flex justify-between w-full max-w-4xl mb-6">
                    <!-- Navbar Selection -->
                    <div>
                        <label for="navbar-select">Navbar Template:</label>
                        <select id="navbar-select">
                            <option value="burger" <?php echo ($_GET["navbar"]==="burger" ) ? "selected" : "" ; ?>
                                >Burger
                            </option>
                            <option value="classic" <?php echo ($_GET["navbar"]==="classic" ) ? "selected" : "" ; ?>
                                >Classique</option>
                            <option value="modern" <?php echo ($_GET["navbar"]==="modern" ) ? "selected" : "" ; ?>
                                >Modern
                            </option>
                        </select>
                    </div>
                    <!-- Main Selection -->
                    <div>
                        <label for="main-select">Main Template:</label>
                        <select id="main-select">
                            <option value="complex" <?php echo ($_GET["main"]==="complex" ) ? "selected" : "" ; ?>
                                >Complex
                            </option>
                            <option value="modern" <?php echo ($_GET["main"]==="modern" ) ? "selected" : "" ; ?>>Modern
                            </option>
                            <option value="simple" <?php echo ($_GET["main"]==="simple" ) ? "selected" : "" ; ?>>Simple
                            </option>
                        </select>
                    </div>
                    <!-- Footer Selection -->
                    <div>
                        <label for="footer-select">Footer Template:</label>
                        <select id="footer-select">
                            <option value="complex" <?php echo ($_GET["footer"]==="complex" ) ? "selected" : "" ; ?>
                                >Complex</option>
                            <option value="modern" <?php echo ($_GET["footer"]==="modern" ) ? "selected" : "" ; ?>
                                >Modern</option>
                            <option value="simple" <?php echo ($_GET["footer"]==="simple" ) ? "selected" : "" ; ?>
                                >Simple</option>
                        </select>
                    </div>
                    <!-- Color Picker -->
                    <div>
                        <label for="color-picker">Main Color:</label>
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