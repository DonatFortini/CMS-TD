document.getElementById('imageSelect{{ $bloc->idBloc }}').addEventListener('change', function() {
    const selectedImage = this.value;
    const previewDiv = document.getElementById('imagePreview{{ $bloc->idBloc }}');
    previewDiv.innerHTML = `<img src="/assets/imageBlocs/${selectedImage}" alt="${selectedImage}" class="w-full">`;
});