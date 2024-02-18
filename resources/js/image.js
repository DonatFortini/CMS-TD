document.addEventListener('DOMContentLoaded', function() {
    const selects = document.querySelectorAll('.image-select-dropdown');

    selects.forEach(select => {
        const blocId = select.id.replace('imageSelect', '');
        select.addEventListener('change', function() {
            const selectedImage = this.value;
            const previewDiv = document.getElementById('imagePreview' + blocId);
            if (selectedImage) {
                previewDiv.innerHTML = `<img src="/assets/imageBlocs/${selectedImage}" alt="${selectedImage}" class="w-full">`;
            } else {
                previewDiv.innerHTML = '';
            }
        });
        select.dispatchEvent(new Event('change'));
    });
});
