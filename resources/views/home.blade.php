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

<!-- Content Section 1 -->
<div id="section-1" class="section-1 min-h-screen flex items-center">
    <div class="container mx-auto text-center">
        <h1 class="text-6xl font-bold content-title">Another Title</h1>
        <div class="flex items-center justify-center mt-8">
            <p class="text-lg content-text mr-4">Another Slogan</p>
            <p class="text-lg content-text">More describing text on the side.</p>
        </div>
    </div>
</div>

<!-- Content Section 2 -->
<div id="section-2" class="section-2 min-h-screen flex items-center">
    <div class="container mx-auto text-center">
        <h1 class="text-6xl font-bold content-title">One More Title</h1>
        <div class="flex items-center justify-center mt-8">
            <p class="text-lg content-text mr-4">One More Slogan</p>
            <p class="text-lg content-text">Even more describing text on the side.</p>
        </div>
    </div>
</div>
@endsection