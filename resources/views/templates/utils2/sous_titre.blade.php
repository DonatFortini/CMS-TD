@vite('resources/css/text.css')
<div class="sous_tire content " style="height:{{$bloc->hauteur}}px;">
    <h2 contenteditable="true" data-placeholder="Écrire votre sous titre ici..." class="editable textarea">
        {{$bloc->contenu}}</h2>
</div>