@extends('layouts.base')
@section('navbar')
<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <a href="#" class="text-white font-bold">Your Logo</a>
        </div>
        <div>
            <button id="nav-toggle" class="text-white lg:hidden focus:outline-none">
                <img src="{{ asset('assets/burger.svg') }}" alt="Burger Menu" class="w-16">
            </button>
        </div>
        <div class="hidden lg:flex lg:items-center lg:w-auto" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3">
                    <a href="#" class="text-white">Home</a>
                </li>
                <li class="mr-3">
                    <a href="#" class="text-white">About</a>
                </li>
                <li class="mr-3">
                    <a href="#" class="text-white">Services</a>
                </li>
                <li class="mr-3">
                    <a href="#" class="text-white">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('nav-toggle');
        const navContent = document.getElementById('nav-content');
        toggleButton.addEventListener('click', function () {
            navContent.classList.toggle('hidden');
        });
    });
</script>
@endsection