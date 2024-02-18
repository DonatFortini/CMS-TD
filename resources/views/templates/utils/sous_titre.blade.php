@section("sous_titre_{$bloc->idBloc}")
<head>
    @vite('resources/css/text.css')
</head>
    <div class="sous_tire content" style="height:{{$bloc->hauteur}}px; border:1px solid red">
        <h2 contenteditable="true" data-placeholder="Écrire votre sous titre ici..." class="editable textarea" id="sousTitreContent_{{$bloc->idBloc}}">{{$bloc->contenu}}</h2>
    </div>
@endsection