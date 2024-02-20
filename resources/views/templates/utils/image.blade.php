@if(isset($isViewMode) && $isViewMode)
    <div id="imagePreview{{ $bloc->idBloc }}" class="image-preview">
        @if($bloc->contenu)
            <img src="/assets/imageBlocs/{{ $bloc->contenu }}" alt="Image" class="w-full">
        @endif
    </div>
@else
    <div class="image-select">
        <label for="imageSelect{{ $bloc->idBloc }}">Choisissez une image :</label>
        <select id="imageSelect{{ $bloc->idBloc }}" class="image-select-dropdown">
            @foreach(File::allFiles(public_path('assets/imageBlocs')) as $image)
                <option value="{{ basename($image) }}" {{ basename($image) == $bloc->contenu ? 'selected' : '' }}>{{ basename($image) }}</option>
            @endforeach
        </select>
    </div>
    <div id="imagePreview{{ $bloc->idBloc }}" class="image-preview">
        @if($bloc->contenu)
            <img src="/assets/imageBlocs/{{ $bloc->contenu }}" alt="Image Preview" class="w-full">
        @endif
    </div>
@endif
