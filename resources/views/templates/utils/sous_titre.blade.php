@section("sous_titre_{$bloc->idBloc}")
@vite('resources/css/text.css')

<div class="sous_titre content" style="height:{{$bloc->hauteur}}px;">
    <h2 @if(!isset($isViewMode) || !$isViewMode) contenteditable="true" @endif
        data-placeholder="Écrire votre sous titre ici..." class="editable textarea"
        id="sousTitreContent_{{$bloc->idBloc}}">{{$bloc->contenu}}</h2>
</div>
@endsection