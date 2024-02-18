@section("form_{$bloc->idBloc}")
    <div class="content" style="height:{{$bloc->hauteur}}px; border:1px solid red">
        <form action="{{ route('page.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="dns" class="block text-gray-700 text-sm font-bold mb-2">Nom de la page</label>
                <input type="text" name="dns" id="dns" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre de la page</label>
                <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description de la page</label>
                <input type="text" name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Contenu de la page</label>
                <textarea name="content" id="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <div class="flex items center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
@endsection