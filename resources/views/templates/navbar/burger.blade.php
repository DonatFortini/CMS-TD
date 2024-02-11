@section('navbar')
<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center relative">
        <div id="x" class="relative">
            <a href="#" class="text-white font-bold mr-8 p-4">Your Logo</a>
            <button id="nav-toggle" class="text-white lg:hidden focus:outline-none absolute right-0 top-0 mt-1 mr-4">
                <img src="{{ asset('assets/burger.svg') }}" alt="Burger Menu" class="w-6">
            </button>
            <div id="nav-content" class="hidden absolute bg-gray-800 mt-2 lg:mt-0 lg:flex lg:items-center lg:w-auto lg:p-4 right-0 top-100%">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                        <a href="#" class="text-white hover:text-gray-400">Home</a>
                    </li>
                    <li class="mr-3">
                        <a href="#" class="text-white hover:text-gray-400">About</a>
                    </li>
                    <li class="mr-3">
                        <a href="#" class="text-white hover:text-gray-400">Services</a>
                    </li>
                    <li class="mr-3">
                        <a href="#" class="text-white hover:text-gray-400">Contact</a>
                    </li>
                </ul>
            </div>
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

<style>
    @media (min-width: 1024px) {
        #nav-content {
            position: relative;
        }
        #x {
            display: flex;
        }
    }
</style>
@endsection
