@section("image")
    <div class="flex flex-col items-center justify-center">
        <h1 class="font-bold text-center">Contenu de la page</h1>
        <div id="playground" class="w-3/4">
            <img src="{{ asset('storage/images/'.$image->url) }}" alt="{{ $image->alt }}" class="w-full">
        </div>
    </div>
@endsection