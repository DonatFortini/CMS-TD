@extends('layouts.base')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CMSTD') }}</title>
    @vite('resources/css/backOffice.css')
    @vite('resources/js/backOffice.js')
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function previewTemplate() {
            const navbar = document.getElementById('navbar-select').value;
            const footer = document.getElementById('footer-select').value;
            const body = document.getElementById('body-select').value;
            const color = document.getElementById('color-picker').value;

            // Masquer tous les templates
            document.querySelectorAll('.template-preview').forEach((element) => {
                element.style.display = 'none';
            });

            // Afficher le template sélectionné
            const a = document.getElementById(`preview-navbar-${navbar}`)
            a.style.display = 'block';
            console.log(a);
            document.getElementById(`preview-footer-${footer}`).style.display = 'block';
            document.getElementById(`preview-body-${body}`).style.display = 'block';

            // Appliquer la couleur sélectionnée
            document.getElementById('preview-section').style.backgroundColor = color;
        }
    </script>
</head>
<body class="flex-column h-screen w-screen bg-gray-800 text-white">
    <!-- Navigation -->
    <nav class="bg-gray-900 p-4">
        <ul class="flex items-center justify-between">
            <li><img src="{{ asset('css/logo.png') }}" alt="Logo"></li>
            <li><a href="{{ route('home') }}" class="text-white font-bold">Home</a></li>
        </ul>
    </nav>

    <!-- Content -->
    <div id="content" class="flex flex-col items-center p-6">
        <!-- Template Selection -->
        <div class="flex justify-between w-full max-w-4xl mb-6">
            <!-- Navbar Selection -->
            <div>
                <label for="navbar-select">Navbar Template:</label>
                <select id="navbar-select" onchange="previewTemplate()">
                    <option value="burger">Burger</option>
                    <option value="classique">Classique</option>
                    <option value="modern">Modern</option>
                </select>
            </div>
            <!-- Footer Selection -->
            <div>
                <label for="footer-select">Footer Template:</label>
                <select id="footer-select" onchange="previewTemplate()">
                    <option value="complex">Complex</option>
                    <option value="modern">Modern</option>
                    <option value="simple">Simple</option>
                </select>
            </div>
            <!-- Body Selection -->
            <div>
                <label for="body-select">Body Template:</label>
                <select id="body-select" onchange="previewTemplate()">
                    <option value="complex">Complex</option>
                    <option value="modern">Modern</option>
                    <option value="simple">Simple</option>
                </select>
            </div>
            <!-- Color Picker -->
            <div>
                <label for="color-picker">Main Color:</label>
                <input type="color" id="color-picker" onchange="previewTemplate()">
            </div>
        </div>

        <!-- Preview Section -->
        <div id="preview-section" class="w-full max-w-4xl h-96">
            <!-- Navbar Previews -->
            <div id="preview-navbar-burger" class="template-preview" style="display: none; min-height: 100px;">@include('templates.navbar.burger')</div>
            <div id="preview-navbar-classique" class="template-preview" style="display: none; min-height: 100px;">@include('templates.navbar.classic')</div>
            <div id="preview-navbar-modern" class="template-preview" style="display: none; min-height: 100px;">@include('templates.navbar.modern')</div>
            
            <!-- Body Previews -->
            <div id="preview-body-complex" class="template-preview" style="display: none;">@include('templates.main.complex')</div>
            <div id="preview-body-modern" class="template-preview" style="display: none;">@include('templates.main.modern')</div>
            <div id="preview-body-simple" class="template-preview" style="display: none;">@include('templates.main.simple')</div>

            <!-- Footer Previews -->
            <div id="preview-footer-complex" class="template-preview" style="display: none;">@include('templates.footer.complex')</div>
            <div id="preview-footer-modern" class="template-preview" style="display: none;">@include('templates.footer.modern')</div>
            <div id="preview-footer-simple" class="template-preview" style="display: none;">@include('templates.footer.simple')</div>
        </div>
    </div>
</body>
</html>
