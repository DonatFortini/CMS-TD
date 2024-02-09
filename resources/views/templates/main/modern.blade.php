@section('content')
<main class="container mx-auto px-4 py-8">
    <article class="max-w-3xl mx-auto">
        <header class="text-center mb-8">
            <h1 class="text-4xl font-bold mb-2">Title of the Blog Article</h1>
            <p class="text-gray-600">Published on February 9, 2024</p>
        </header>
        <div class="prose lg:prose-xl">
            <img src="https://via.placeholder.com/800x400" alt="Image" class="mb-6 rounded-lg shadow-lg">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Nulla facilisi. Curabitur auctor, nulla vel luctus tristique, leo velit tristique risus, non fermentum lorem neque ac justo.</p>
            <p>Phasellus nec enim nisi. Fusce finibus tempor nulla, sit amet tincidunt nisi fringilla nec. Vivamus ullamcorper, urna eget fringilla feugiat, lacus sapien scelerisque magna, eu vestibulum sapien nunc non nisi. Quisque eu sagittis nulla.</p>
            <blockquote class="border-l-4 border-gray-500 italic pl-4 my-6">"Suspendisse potenti. Integer lacinia fringilla ligula, id venenatis dui lacinia id."</blockquote>
            <p>Donec et tortor vel felis efficitur vestibulum. Nam commodo mi id elit ullamcorper, in aliquet sapien faucibus. Nam in enim a ipsum commodo auctor.</p>
            <p>Quisque nec felis quis dui lobortis fermentum a id libero. Nulla eu ipsum nec magna viverra ullamcorper sit amet ut justo.</p>
            <div class="mt-8">
                <h2 class="text-2xl font-semibold mb-4">Author</h2>
                <div class="flex items-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="Author Avatar" class="w-10 h-10 rounded-full mr-4">
                    <div>
                        <p class="text-lg font-semibold">John Doe</p>
                        <p class="text-sm text-gray-600">Writer &amp; Blogger</p>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Nulla facilisi. Curabitur auctor, nulla vel luctus tristique, leo velit tristique risus, non fermentum lorem neque ac justo.</p>
            </div>
            <div class="mt-8">
                <h2 class="text-2xl font-semibold mb-4">Related Articles</h2>
                <ul>
                    <li><a href="#" class="text-blue-600 hover:underline">Article 1</a></li>
                    <li><a href="#" class="text-blue-600 hover:underline">Article 2</a></li>
                    <li><a href="#" class="text-blue-600 hover:underline">Article 3</a></li>
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