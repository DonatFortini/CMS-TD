@extends('layouts.app')

@vite('resources/js/dashboard.js')

@section('content')
<div class="pt-24 container mx-auto px-4 py-8 h-screen ">
    <div class="mb-6">
        <h1 class="text-3xl font-semibold">Tableau de Bord</h1>
        <p class="text-gray-600">Visualisez et gérez vos sites ici.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($sites as $site)
        <div class="bg-slate-300 p-4 rounded-lg shadow hover:shadow-lg transition duration-300">
            <h2 class="text-xl font-semibold mb-2">{{ $site->nom }}</h2>
            <p class="text-gray-600 mb-4">DNS : {{ $site->dns }}</p>
            <a href="{{ route('backOffice', ['dns' => $site->dns]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-xs">
                Modifier
            </a>
            <a href="/{{ $site->dns }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-xs ml-2">
                Visualiser
            </a>
        </div>
        @endforeach
    </div>

    <div class="mb-6 p-4">
        <a href="{{ route('createSite') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Créer un Nouveau Site
        </a>
    </div>
</div>
@endsection
