@section("commentaires_{$bloc->idBloc}")
<div class="flex w-screen ">
    <div class="w-1/2 overflow-y-auto ">
        <!-- Partie gauche - Affichage des commentaires -->
        @foreach($commentaires as $commentaire)
        <div class="bg-gray-100 p-4 rounded-lg mb-4 w-3/4">
            <p>{{ $commentaire->contenu }}</p>
            <p>{{ $commentaire->date_creation }}</p>
        </div>
        @endforeach
    </div>
    <div class="w-1/2">
        <!-- Partie droite - Formulaire pour écrire un commentaire -->
        <form action="{{ route('comments.store') }}" method="POST" class="bg-gray-100 p-4 rounded-lg">
            @csrf
            <label for="comment" class="mb-2">Nouveau commentaire :</label>
            <input type="hidden" name="idPage" id="" value="{{$bloc->idPage}}">
            <input type="text" name="contenu" id="comment"
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            <button type="submit"
                class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Submit</button>
        </form>
    </div>
</div>
@endsection