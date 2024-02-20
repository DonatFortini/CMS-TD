@section('content')
<main class="container mx-auto py-8 px-4">
    <article class="grid grid-cols-12 gap-8">
        <div class="col-span-12 md:col-span-8">
            <h1 class="text-4xl font-bold mb-4">{{ $site->nom ?? 'Title of the Blog Article' }}</h1>
            <p class="text-gray-600 mb-4" id="auteur">Published by {{ $site->auteur ?? 'Author Name' }}</p>
            <img src="{{ $site->pathImage ?? 'https://via.placeholder.com/800x400' }}" alt="Placeholder Image" class="mb-6">
            <p class="mb-4" id="description1">{{ $site->description1 ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec semper diam sed massa pellentesque lobortis. Phasellus at lorem faucibus, aliquam nulla sit amet, aliquam massa. Nullam et nisl ultrices, malesuada odio quis, aliquet tellus. Ut blandit ex augue, id finibus augue facilisis sit amet. Praesent sed vulputate erat. Proin commodo imperdiet mollis. Etiam sit amet condimentum enim. Morbi a pellentesque tellus. Cras tincidunt justo non lacus congue, non vehicula neque ultrices. Donec posuere vestibulum enim, et ullamcorper augue condimentum nec. Nulla quis viverra mi, sit amet consectetur orci. Mauris pulvinar auctor nulla non faucibus. In porttitor lectus ipsum, in tincidunt mauris pharetra quis. Suspendisse commodo nunc in orci luctus, in dignissim tellus egestas. Nam commodo auctor augue, non rutrum massa aliquam ac.

Phasellus ac tellus auctor, tempus dolor et, tempor sapien. Donec tempus ante vitae leo maximus, a ullamcorper justo convallis. Sed ullamcorper faucibus venenatis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum at faucibus leo. Pellentesque fringilla lorem at rutrum malesuada. In aliquam, massa ac tempus ultricies, est mi pulvinar odio, ut condimentum augue enim id massa. Phasellus interdum arcu ut mi euismod lobortis. In eget nulla libero. Etiam ante quam, pharetra ac quam a, cursus bibendum ligula. Maecenas dignissim id lacus ac volutpat. Pellentesque eget hendrerit ligula, at volutpat turpis. Donec eu purus ut neque finibus viverra. Fusce condimentum feugiat porttitor. Maecenas id turpis scelerisque, suscipit ex nec, ullamcorper ante. Aliquam erat volutpat.' }}</p>
            <blockquote class="border-l-4 border-gray-600 italic pl-4 mb-6">"{{ $site->description2 ?? 'Suspendisse potenti. Integer lacinia fringilla ligula, id venenatis dui lacinia id.' }}"</blockquote>
        </div>
        <div class="col-span-12 md:col-span-4">
            <div class="bg-white shadow p-4 mb-6">
                <h2 class="text-lg font-semibold mb-4">About the Author</h2>
                <div class="flex items-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="Author Avatar" class="w-10 h-10 rounded-full mr-2">
                    <div>
                        <p class="text-sm text-gray-600">{{ $site->auteur ?? 'Author Name' }}</p>
                        <p class="text-xs text-gray-500">Writer & Blogger</p>
                    </div>
                </div>
                <p class="text-sm" id="description2">{{ $site->description2 ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Nulla facilisi. Curabitur auctor.' }}</p>
            </div>
            <div class="bg-white shadow p-4 mb-6">
                <h2 class="text-lg font-semibold mb-4">Related Articles</h2>
                <ul>
                    @foreach($pages as $page)
                    <li><a href="{{ url('/page/' . $page->dns) }}" class="text-blue-600 hover:underline">{{ $page->nom }}</a></li>                    @endforeach
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