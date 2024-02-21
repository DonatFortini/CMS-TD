@vite('resources/css/text.css')
<div class="titre content" style="height:{{$bloc->hauteur}}px;">
    <h1 contenteditable="true" data-placeholder="Écrire le titre ici..." class="editable textarea">{{$bloc->contenu}}
    </h1>
</div>