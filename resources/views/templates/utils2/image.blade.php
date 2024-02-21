@vite('resources/css/image.css')
@vite('resources/js/image.js')
<div class="flex flex-col items-center justify-center content">
    <h1 class="font-bold text-center">Image Block</h1>
    <div class="image-select">
        <label for="imageSelect{{ $bloc->idBloc }}">Choisissez une image :</label>
        <select id="imageSelect{{ $bloc->idBloc }}" class="image-select-dropdown">
            @foreach(File::allFiles(public_path('assets/imageBlocs')) as $image)
            <option value="{{ basename($image) }}">{{ basename($image) }}</option>
            @endforeach
        </select>
    </div>
    <div id="imagePreview{{ $bloc->idBloc }}" class="image-preview"></div>
</div>