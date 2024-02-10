@section('navbar')
<nav class="bg-gradient-to-r from-purple-700 to-indigo-800 shadow-lg">
    <div class="container mx-auto px-4 py-2">
        <div class="flex justify-between items-center">
            <div>
                <a href="#" class="text-white font-bold text-xl">Your Logo</a>
            </div>
            <div id="nav-content" class="hidden lg:flex lg:items-center lg:w-auto">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-6">
                        <a href="#" class="text-white hover:text-purple-300">Home</a>
                    </li>
                    <li class="mr-6">
                        <a href="#" class="text-white hover:text-purple-300">About</a>
                    </li>
                    <li class="mr-6">
                        <a href="#" class="text-white hover:text-purple-300">Services</a>
                    </li>
                    <li class="mr-6">
                        <a href="#" class="text-white hover:text-purple-300">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="lg:hidden">
                <button id="nav-toggle" class="text-white focus:outline-none">
                    <svg class="h-8 w-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path v-if="!isOpen" fill-rule="evenodd" clip-rule="evenodd" d="M3 5h18a1 1 0 110 2H3a1 1 0 110-2zm18 6H3a1 1 0 100 2h18a1 1 0 100-2zm0 6H3a1 1 0 100 2h18a1 1 0 100-2z"/>
                        <path v-else fill-rule="evenodd" clip-rule="evenodd" d="M4.293 19.293a1 1 0 001.414 0l6.293-6.293 1.414 1.414L7.414 20H20a1 1 0 100-2H8.414l4.293-4.293-1.414-1.414-6.293 6.293a1 1 0 000 1.414z"/>
                    </svg>
                </button>
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
@endsection