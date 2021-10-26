export { loadImageProduct, deletePreview };

function loadImageProduct() {
    var preview_img = document.querySelector("input[type='file']");
    preview_img.addEventListener('input', () => {
        $('#delete-preview-img').css('display', 'block');
        $('#product-preview-image').attr('src', URL.createObjectURL(preview_img.files[0]));
    });

    msgProvider.send({ status: 'successful', text: 'Immagine caricata' });
}

function deletePreview(e) {
    preview_img.value = null;
    $('#product-preview-image').attr('src', '#');
    $('#delete-preview-img').css('display', 'none');
    msgProvider.send({ status: 'successful', text: 'Immagine eliminata' });
}