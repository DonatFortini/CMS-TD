@section("titre_{$bloc->idBloc}")
<head>
    @vite('resources/css/text.css')
</head>
    <div class="titre content" style="height:{{$bloc->hauteur}}px; border:1px solid red">
        <h1 Contenteditable="true" data-placeholder="Écrire le titre ici..." class="editable textarea" id="titreContent_{{$bloc->idBloc}}">{{$bloc->contenu}}</h1>
    </div>
@endsection
