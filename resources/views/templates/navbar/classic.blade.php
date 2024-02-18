@section('navbar')
<nav class="bg-gray-800 shadow-lg">
    <div class="container mx-auto px-4 py-2">
        <div class="flex justify-between items-center">
            <div>
                <a href="#" id="Logo" class="text-white font-bold"></a>
            </div>
            <div class="hidden lg:flex lg:items-center lg:w-auto">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-6">
                        <a href="#" class="text-white hover:text-gray-300">Home</a>
                    </li>
                    <li class="mr-6">
                        <a href="#" class="text-white hover:text-gray-300">About</a>
                    </li>
                    <li class="mr-6">
                        <a href="#" class="text-white hover:text-gray-300">Services</a>
                    </li>
                    <li class="mr-6">
                        <a href="#" class="text-white hover:text-gray-300">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

@endsection