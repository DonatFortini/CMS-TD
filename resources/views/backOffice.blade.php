<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        @if(isset($_GET['page']) && $_GET['page'] == "page_$page->idPage")
                            <li id="page_{{ $page->idPage }}" class="page-item cursor-pointer bg-purple-500">{{ $page->nom }}</li>
                        @else
                            <li id="page_{{ $page->idPage }}" class="page-item cursor-pointer">{{ $page->nom }}</li>
                        @endif
                        @endforeach
                    </ul>
                    <button id="openAddPageModal" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                        Ajouter une Page
                    </button>
                    <div id="addPageModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <form method="POST" action="{{ route('pages.store') }}" class="p-4">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre de la page :</label>
                                        <input type="text" name="titre" id="titre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>

                                    <input type="hidden" name="idSite" value="{{ $site->idSite }}">

                                    <div class="flex items-center justify-end">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Ajouter
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <main id="page-constructor" class="w-3/5 bg-gray-200 overflow-scroll">
                    <h1 class="font-bold text-center">Contenu de la page</h1>
                    <div id="playground" class="h-full">
                        <ol id="disposition_page">
                            @php
                            $currentPageId = explode('_', request('page'))[1] ?? null;
                            $order = 1;
                            @endphp
                            @foreach ($pages as $page)
                            @if ($page->idPage == $currentPageId)
                            @foreach ($page->blocs as $bloc)
                            @php
                            $type = strtolower($bloc->type);
                            $sectionName = "{$type}_{$bloc->idBloc}";
                            @endphp
                            @if(view()->exists("templates.utils.$type"))
                            @include("templates.utils.$type", ['bloc' => $bloc])
                            <li id="bloc_{{ $order }}" data-type="{{ $bloc->type }}"
                                class="flex-col bg-slate-300 border-2 border-black m-5 rounded-3xl cursor-grab"
                                data-id="{{ $bloc->idBloc }}" style="min-height: 75px;">
                                <div id="blocTop" class="flex justify-between p-2">
                                    <button id="deletebloc_{{ $order }}"
                                        class="bg-slate-400 rounded-3xl hover:bg-red-500 hover:text-white transition duration-400 inline-block">
                                        <img src="{{ asset('assets/trash.svg') }}" class="w-7 h-7">
                                    </button>
                                    <label for="name" class="bg-slate-400 inline-block">Type {{$bloc->type}}</label>
                                </div>
                                @yield($sectionName)
                            </li>
                            @php
                            $order++;
                            @endphp
                            @else
                            <p>Le template pour le type de bloc '{{ $type }}' n'existe pas.</p>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </ol>
                    </div>
                </main>

                <section id="blockSection" class="bg-slate-100 w-1/5">
                    <ul id="listeBlocks">
                        <li id="texte" data-type='text_zone' class="cursor-grab">Zone de texte</li>
                        <li id="image" data-type='image' class="cursor-grab">Image</li>
                        <li id="titreBlock" data-type='titre' class="cursor-grab">Titre</li>
                        <li id="stitre" data-type='sous_titre'class="cursor-grab">Sous-titre</li>
                        <li id="formulaire" data-type='form'class="cursor-grab">Formulaire</li>
                        <li id="contact" data-type='contact' class="cursor-grab">Contact</li>
                        <li id="commentaires" data-type='commentaires' class="cursor-grab">Commentaires</li>
                    </ul>
                    @csrf
                    <button id="addBlocs" data-store-url="{{ route('blocks.store') }}" data-page-id="{{ $currentPageId }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                        Valider les modifications
                    </button>
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