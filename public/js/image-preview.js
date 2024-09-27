document.getElementById('image-upload').addEventListener('change', function(event) {
    var imagePreview = document.getElementById('image-preview-img');
    var file = event.target.files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block'; // Tampilkan gambar setelah dipilih
        }

        reader.readAsDataURL(file); // Membaca file sebagai Data URL
    } else {
        imagePreview.style.display = 'none'; // Sembunyikan gambar jika tidak ada file
        imagePreview.src = '';
    }
});
