@extends('layouts.app')

@section('content')
@vite('resources/js/home.js')
<!-- Content Section 0 -->
<div id="section-0" class="section-0 min-h-screen flex items-center active">
    <div class="container mx-auto text-center">
        <h1 class="text-6xl font-bold neon content-title">CMSTD</h1>
        <div class="flex items-center justify-center mt-8">
            <p class="text-lg content-text mr-4">Créer un site n'as jamais été aussi simple !!</p>
            <p class="text-lg content-text">Créer une multitude de sites internets pour toutes vos passion en quelques clicks !</p>
        </div>
    </div>
</div>

<div id="section-1" class="section-1 min-h-screen flex items-center">
    <div class="container mx-auto text-center">
        <div class="flex items-center justify-center">
            <?php
                $templates = [
                    'assets/template1.png',
                    'assets/template2.png',
                    'assets/template3.png'
                ];
                shuffle($templates);
            ?>
            <div class="relative">
                <img src="{{ asset($templates[0]) }}" alt="Template 1" style="width: 550px; height: auto;">
            </div>
            <div class="ml-8">
                <div class="relative" style="margin-top: 100px;">
                    <img src="{{ asset($templates[1]) }}" alt="Template 2" style="width: 550px; height: auto;">
                </div>
            </div>
            <div class="ml-8">
                <div class="relative" style="margin-top: 200px;">
                    <img src="{{ asset($templates[2]) }}" alt="Template 3" style="width: 550px; height: auto;">
                </div>
            </div>
            <div class="flex flex-col items-end">
                <h1 class="text-6xl font-bold">Combinaison en folie !!</h1>
                <p class="text-xl mt-4">Jusqu'a 27 combinaisons possible pour les template et 45 couleurs différentes pour personaliser votre homepage !</p>
            </div>
        </div>
    </div>
</div>

<div id="section-2" class="section-2 min-h-screen flex items-center">
    <div class="container mx-auto text-center">
        <h1 class="text-6xl font-bold content-title">Suivez l'évolution de votre blog en direct</h1>
        <div class="flex items-center justify-center mt-8">
            <p class="text-lg content-text mr-4">Grâce au dashboard manager plusieur blog n'a jamais été aussi simple !</p>
        </div>
    </div>
</div>
@endsection