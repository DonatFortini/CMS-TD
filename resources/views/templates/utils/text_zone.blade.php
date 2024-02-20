@section("text_zone_{$bloc->idBloc}")
<head>
    @vite('resources/css/text.css')
</head>
  <div class="flex flex-col items-center justify-center content" style="height:{{$bloc->hauteur}}px;">
    <p @if(!isset($isViewMode) || !$isViewMode) contenteditable="true" @endif class="editable textarea" data-placeholder="Écrire le texte ici..." id="textContent_{{$bloc->idBloc}}">{{$bloc->contenu}}</p>
  </div>
@endsection