@section("titre_{$bloc->idBloc}")

@vite('resources/css/text.css')

<div class="titre content" style="height:{{$bloc->hauteur}}px;">
    <h1 @if(!isset($isViewMode) || !$isViewMode) contenteditable="true" @endif data-placeholder="Écrire le titre ici..."
        class="editable textarea" id="titreContent_{{$bloc->idBloc}}">{{$bloc->contenu}}</h1>
</div>
@endsection