const fileInput = document.getElementById('image');
const imagePreview = document.getElementById('image-preview');

fileInput.addEventListener('change', function () {
    const files = this.files; // Get all selected files
    imagePreview.innerHTML = ''; // Clear previous previews

    for (let i = 0; i < files.length; i++) {
        const file = files[i];

        if (file && file.type.startsWith('image')) {
            const reader = new FileReader();

            reader.addEventListener('load', function () {
                const img = document.createElement('img');
                img.src = reader.result;
                img.classList.add('preview-image');
                imagePreview.appendChild(img);
            });

            reader.readAsDataURL(file);
        }
    }

    if (imagePreview.children.length === 0) {
        imagePreview.innerHTML = '<p>No images selected</p>';
    }
});

//


