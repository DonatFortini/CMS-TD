@section('content')
<main class="container mx-auto px-4 py-8">
    <article class="max-w-3xl mx-auto">
        <header class="text-center mb-8">
            <h1 class="text-4xl font-bold mb-2">{{ $site->nom ?? 'Title of the Blog Article' }}</h1>
            <p class="text-gray-600">Published by {{ $site->auteur ?? 'Author Name' }}</p>
        </header>
        <div class="prose lg:prose-xl">
            <img src="{{ $site->pathImage ?? 'https://via.placeholder.com/800x400' }}" alt="Image" class="mb-6 rounded-lg shadow-lg">
            <p id="description1">{{ $site->description1 ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...' }}</p>
            <blockquote class="border-l-4 border-gray-500 italic pl-4 my-6" id="description2">"{{ $site->description2 ?? 'Suspendisse potenti...' }}"</blockquote>
            <p>Donec et tortor vel felis efficitur vestibulum...</p>
            <p>Quisque nec felis quis dui lobortis fermentum...</p>
            <div class="mt-8">
                <h2 class="text-2xl font-semibold mb-4">About the Author</h2>
                <div class="flex items-center mb-4">
                    <img src="{{ $site->pathImage ?? 'https://via.placeholder.com/50' }}" alt="Author Avatar" class="w-10 h-10 rounded-full mr-4">
                    <div>
                        <p class="text-lg font-semibold" id="auteur">{{ $site->auteur ?? 'John Doe' }}</p>
                        <p class="text-sm text-gray-600">Writer & Blogger</p>
                    </div>
                </div>
                <p>{{ $site->description2 ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...' }}</p>
            </div>
            <div class="mt-8">
                <h2 class="text-2xl font-semibold mb-4">Related Articles</h2>
                <ul>
                    @foreach($pages as $page)
                    <li><a href="{{ url('/page/' . $page->dns) }}" class="text-blue-600 hover:underline">{{ $page->nom }}</a></li>                    @endforeach
                </ul>
            </div>
            <div class="mt-8">
                <h2 class="text-2xl font-semibold mb-4">Tags</h2>
                <div class="flex flex-wrap">
                    <a href="#" class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm mr-2 mb-2 hover:bg-gray-300 hover:text-gray-700">Tag 1</a>
                    <a href="#" class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm mr-2 mb-2 hover:bg-gray-300 hover:text-gray-700">Tag 2</a>
                    <a href="#" class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm mr-2 mb-2 hover:bg-gray-300 hover:text-gray-700">Tag 3</a>
                </div>
            </div>
        </div>
    </article>
</main>
@endsection
