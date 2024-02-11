@section("textZone")
    <div class="flex flex-col items-center justify-center">
        <h1 class="font-bold text-center">Contenu de la page</h1>
        <div id="playground" class="w-3/4">
            <p class="text-justify">{{ $textZone->content }}</p>
        </div>
    </div>
@endsection