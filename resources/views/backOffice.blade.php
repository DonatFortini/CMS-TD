<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CMSTD') }}</title>
    @vite('resources/css/backOffice.css')
    @vite('resources/css/app.css')
    @vite('resources/js/backOffice.js')
</head>

<body class="flex-column h-screen w-screen">

    <nav class="navbar top-0 w-full p-4" style="height:10vh;">
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


    <div id="content" class="flex " style="height:90vh;">
        <section class="w-1/6 bg-gray-400 rounded-lg p-6 shadow-md">
            <h1 class="text-3xl font-extrabold text-purple-700 mb-6">Fonctionnalités</h1>
            <ul class="space-y-4">
                <li id="create" class=" hover:bg-purple-500 hover:text-white rounded-lg transition duration-300 ">
                    <a
                        class="active block py-3 px-6 text-purple-700  hover:bg-purple-600 hover:text-white rounded-lg transition duration-300 ">Création
                        de contenu</a>
                </li>
                <li id="comments" class="hover:bg-purple-500 hover:text-white rounded-lg transition duration-300">
                    <a
                        class="block py-3 px-6 text-purple-700  hover:bg-purple-600 hover:text-white rounded-lg transition duration-300">Gestion
                        des commentaires</a>
                </li>
            </ul>
        </section>


        <main class="w-5/6  flex">

            <div id="section-1" class="w-screen flex">
                <section class="w-1/5">
                    <ul id="liste_page">
                        @foreach ($pages as $page)
                        <li id=<?php echo "page_$page->idPage" ?> class=
                            <?php echo ($_GET['page']==="page_$page->idPage")? "bg-slate-500":""; ?> >{{ $page->dns }}
                        </li>
                        @endforeach
                    </ul>
                </section>

                <main id="page-constructor" class="w-3/5 bg-gray-200">
                    <h1 class="font-bold text-center">Contenu de la page</h1>
                    <div id="playground">
                        <?php $count=0;?>
                        
                        <div id="element<?php echo $count++?>"></div>
                       
                    </div>
                </main>

                <section id="blockSection" class="bg-slate-100 w-1/5">
                    <ul id="listeBlocks">
                        <li><a id="texte" class="cursor-grab">Zone de texte</a></li>
                        <li><a id="image" class="cursor-grab">Image</a></li>
                        <li><a id="titre" class="cursor-grab">Titre</a></li>
                        <li><a id="stitre" class="cursor-grab">Sous-titre</a></li>
                        <li><a id="formulaire" class="cursor-grab">Formulaire</a></li>
                        <li><a id="contact" class="cursor-grab">Contact</a></li>
                    </ul>
                </section>
            </div>

            <div id="section-2" class="hidden w-screen flex-col  ">
                <h1 class="text-2xl font-bold mb-4 p-4">Gestion des commentaires</h1>
                <div class="flex items-center">
                    <input type="text" id="searchBar" class="border border-gray-300 rounded-lg p-2 w-1/4 m-2"
                        placeholder="Search...">
                    <button id="searchButton"
                        class="bg-purple-500 text-white p-2 rounded-lg hover:bg-purple-600 transition duration-300">
                        <img src="{{ asset('assets/search.svg') }}" class="w-5 h-5">
                    </button>
                </div>
                <div id="commentaires" class="mt-4 items-center">
                    <div class="grid grid-cols-4 gap-4 p-4">
                        @foreach ($commentaires as $commentaire)
                        <div class="bg-gray-300 p-5 rounded-lg">
                            <div class="comment-box bg-white rounded-lg p-4">
                                <p>{{ $commentaire->contenu }}</p>
                            </div>
                            <div class="flex justify-between items-end mt-2">
                                <p class="p-2">date : {{ $commentaire->date_creation }}</p>
                                <form action="{{ route('comments.destroy', $commentaire->idCommentaire) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white px-4 py-2 rounded-lg hover:bg-purple-500 transition duration-300">
                                        <img src="{{ asset('assets/trash.svg') }}" class="w-5">
                                    </button>
                                </form>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </main>

    </div>

</body>

</html>