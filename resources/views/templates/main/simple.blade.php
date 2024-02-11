@section('content')
<main class="container mx-auto py-8 px-4">
    <article class="prose lg:prose-xl">
        <h1 class="text-4xl font-bold mb-4">{{ $site->nom ?? 'Title of the Blog Article' }}</h1>
        <p class="text-gray-600 mb-4">Published by {{ $site->auteur ?? 'Author Name' }}</p>
        <img src="{{ $site->pathImage ?? 'https://via.placeholder.com/800x400' }}" alt="Image" class="mb-4">
        <p>{{ $site->description1 ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Nulla facilisi. Curabitur auctor, nulla vel luctus tristique, leo velit tristique risus, non fermentum lorem neque ac justo.' }}</p>
        <p>{{ $site->description2 ?? 'Phasellus nec enim nisi. Fusce finibus tempor nulla, sit amet tincidunt nisi fringilla nec. Vivamus ullamcorper, urna eget fringilla feugiat, lacus sapien scelerisque magna, eu vestibulum sapien nunc non nisi. Quisque eu sagittis nulla.' }}</p>
        <blockquote class="border-l-4 border-gray-600 italic pl-4 mt-4 mb-4">"{{ $site->description2 ?? 'Suspendisse potenti. Integer lacinia fringilla ligula, id venenatis dui lacinia id.' }}"</blockquote>
    </article>
</main>
@endsection
