@extends('layouts.base')
@section('content')
<main class="container mx-auto py-8 px-4">
    <article class="grid grid-cols-12 gap-8">
        <div class="col-span-12 md:col-span-8">
            <h1 class="text-4xl font-bold mb-4">Title of the Blog Article</h1>
            <p class="text-gray-600 mb-4">Published on February 9, 2024</p>
            <img src="https://via.placeholder.com/800x400" alt="Placeholder Image" class="mb-6">
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Nulla facilisi. Curabitur auctor, nulla vel luctus tristique, leo velit tristique risus, non fermentum lorem neque ac justo.</p>
            <p class="mb-4">Phasellus nec enim nisi. Fusce finibus tempor nulla, sit amet tincidunt nisi fringilla nec. Vivamus ullamcorper, urna eget fringilla feugiat, lacus sapien scelerisque magna, eu vestibulum sapien nunc non nisi. Quisque eu sagittis nulla.</p>
            <blockquote class="border-l-4 border-gray-600 italic pl-4 mb-6">"Suspendisse potenti. Integer lacinia fringilla ligula, id venenatis dui lacinia id."</blockquote>
            <p class="mb-4">Donec et tortor vel felis efficitur vestibulum. Nam commodo mi id elit ullamcorper, in aliquet sapien faucibus. Nam in enim a ipsum commodo auctor.</p>
            <p class="mb-4">Quisque nec felis quis dui lobortis fermentum a id libero. Nulla eu ipsum nec magna viverra ullamcorper sit amet ut justo.</p>
        </div>
        <div class="col-span-12 md:col-span-4">
            <div class="bg-white shadow p-4 mb-6">
                <h2 class="text-lg font-semibold mb-4">About the Author</h2>
                <div class="flex items-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="Author Avatar" class="w-10 h-10 rounded-full mr-2">
                    <div>
                        <p class="text-sm text-gray-600">John Doe</p>
                        <p class="text-xs text-gray-500">Writer &amp; Blogger</p>
                    </div>
                </div>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Nulla facilisi. Curabitur auctor, nulla vel luctus tristique.</p>
            </div>
            <div class="bg-white shadow p-4 mb-6">
                <h2 class="text-lg font-semibold mb-4">Related Articles</h2>
                <ul>
                    <li class="mb-2"><a href="#" class="text-blue-600 hover:underline">Article 1</a></li>
                    <li class="mb-2"><a href="#" class="text-blue-600 hover:underline">Article 2</a></li>
                    <li class="mb-2"><a href="#" class="text-blue-600 hover:underline">Article 3</a></li>
                </ul>
            </div>
            <div class="bg-white shadow p-4">
                <h2 class="text-lg font-semibold mb-4">Tags</h2>
                <div class="flex flex-wrap">
                    <a href="#" class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-sm mr-2 mb-2 hover:bg-gray-300 hover:text-gray-700">Tag 1</a>
                    <a href="#" class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-sm mr-2 mb-2 hover:bg-gray-300 hover:text-gray-700">Tag 2</a>
                    <a href="#" class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-sm mr-2 mb-2 hover:bg-gray-300 hover:text-gray-700">Tag 3</a>
                </div>
            </div>
        </div>
    </article>
</main>
@endsection