<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CMSTD') }}</title>
    @vite('resources/css/backOffice.css')
    @vite('resources/js/backOffice.js')
</head>

<body class="flex-column h-screen w-screen">
    <nav class="bg-gray-800 ">
        <ul class="flex items-center justify-between px-4 py-2">
            <li><img src="{{ asset('css/logo.png') }}" href="{{ route('backOffice') }}" > </img> </li>
            <li><a href="{{route('home')}}" class="text-white font-bold">home</a></li>
        </ul>
    </nav>

    <div id="content" class="flex h-5/6">
        <section class="w-1/6 h-screen bg-gray-200">
            <h1>fonctionalités</h1>
            <ul style="list-style-type: none; padding: 0;">
                <li id="stats" class="hover:bg-gray-500 active"><a>Statistiques du site</a></li>
                <li id="create" class="hover:bg-gray-500"><a>Création de contenu</a></li>
                <li id="comments" class="hover:bg-gray-500"><a>Gestion des commentaires</a></li>
                <li id="pages" class=" hover:bg-gray-500"><a>Mes pages</a></li>
            </ul>
        </section>

        <main class="w-5/6 h-screen flex">

            <!-- section-1 -->
            <div id="section-1" class="flex w-screen">
                <h1>Tableau de Bord</h1>
                <p>Visualisez vos statistiques.</p>
            </div>

            <!-- section-2 -->
            <div id="section-2" class="w-screen hidden">
                <section class="w-1/5">
                    <ul id="liste_page">
                        @foreach ($pages as $page)
                        <li>{{ $page->nom }}</li>
                    </ul>
                </section>

                <main id="page-constructor" class="w-3/5 bg-gray-200">
                    <h1 class="font-bold text-center">Contenu de la page</h1>
                    <div id="playground"></div>
                </main>

                <section id="blockSection" class="bg-slate-100 w-1/5">
                    <!-- block de création de contenu -->
                    <ul id="listeBlocks">
                        <li><a id="texte" class="cursor-grab">Zone de texte</a></li>
                        <li><a id="image" class="cursor-grab">Image</a></li>
                        <li><a id="video" class="cursor-grab">Vidéo</a></li>
                        <li><a id="audio" class="cursor-grab">Audio</a></li>
                        <li><a id="formulaire" class="cursor-grab">Formulaire</a></li>
                        <li><a id="contact" class="cursor-grab">Contact</a></li>
                    </ul>
                </section>
            </div>

            <!-- section-3 -->
            <div id="section-3" class="hidden w-screen">
                <h1>Gestion des commentaires</h1>
                <p>Visualisez et modérez les commentaires.</p>
                <div id="commentaires">

                </div>
            </div>
            <!-- section-4 -->
            <div id="section-4" class="hidden w-screen">
                <h1>Mes pages</h1>
                <p>Visualisez et modifiez vos pages.</p>
                <div id="pages">

                </div>
        </main>
    </div>
</body>

</html>