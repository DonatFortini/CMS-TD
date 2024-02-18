<div class="flex flex-col items-center justify-center content">
    <h1 class="font-bold text-center">Contenu de la page</h1>
    <div id="playground" class="w-3/4" style="height:{{$bloc->hauteur}}px; border:1px solid red">
        <img src="{{ asset('storage/images/'.$image->url) }}" alt="{{ $image->alt }}" class="w-full">
    </div>
</div>
