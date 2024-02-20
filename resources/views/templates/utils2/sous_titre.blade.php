
<head>
    <link rel="stylesheet" href="{{ asset('css/text.css') }}">
</head>
<div class="sous_tire content " style="height:{{$bloc->hauteur}}px;">
    <p>{{$bloc->hauteur}}</p>
    <h2 contenteditable="true" data-placeholder="Écrire votre sous titre ici..." class="editable textarea">{{$bloc->contenu}}</h2>
</div>
