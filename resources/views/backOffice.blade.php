<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CMSTD') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/backOffice.js')
</head>

<nav class="bg-gray-800">
    <ul class="flex items-center justify-between px-4 py-2">
        <li>
            <a href="{{ route('backOffice') }}" class="text-white font-bold">Home</a>
        </li>
    </ul>
</nav>

<body>

    <section class="w-1/6 h-screen bg-gray-200">
        <h1>fonctionalités</h1>
        <ul style="list-style-type: none; padding: 0;">
            <li style="margin-bottom: 8px;"><a href="#">Statistiques du site</a></li>
            <li style="margin-bottom: 8px;"><a href="#">Création de contenu</a></li>
            <li style="margin-bottom: 8px;"><a href="#">Gestion des commentaires</a></li>
            <li style="margin-bottom: 8px;"><a href="#">Mes pages</a></li>
        </ul>
    </section>
    <main class="w-5/6">

    </main>
</body>
</html>