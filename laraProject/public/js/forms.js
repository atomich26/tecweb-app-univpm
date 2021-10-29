export { initInputLoadImg, showTextareaTip };

var inputImage = $("input[type='file']#load-image");
var imageItem = $('#item-image');
var deletePreviewBtn = $('#delete-preview');

var currentExists = () => { 
    let currentImg = deletePreviewBtn.attr('data-url');

    return typeof currentImg !== 'undefined' && currentImg.trim() !== "";
};


function initInputLoadImg() {
    if (inputImage == null)
        return;

    if (currentExists())
        loadCurrent();
    
    inputImage.on('input', function () {
        loadPreview(); 
    });

    deletePreviewBtn.click(() => {
        deleteImage();
    });
}

function loadCurrent() {
    deletePreviewBtn.show();
    imageItem.show();
    inputImage.hide();
}

function deleteCurrent() {
    sendRequestRemoveImg(() => {
        deletePreviewBtn.hide();
        imageItem.hide();
        inputImage.show(); 
    });
}

function loadPreview() {
    deletePreviewBtn.show();
    imageItem.attr('src', URL.createObjectURL(inputImage.prop('files')[0]));
    imageItem.show();
}

function deleteImage() {

    if (currentExists())
        deleteCurrent();
    else {
        inputImage.val(null);
        imageItem.attr('src', "");
        imageItem.hide();
        deletePreviewBtn.hide();
    }
}

function sendRequestRemoveImg(callback) {
    
    if (!confirm("Sicuro di rimuovere l'immagine attuale? L'operazione non è reversibile."))
        return;
    
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: deletePreviewBtn.attr('data-url'),
        type: 'GET',
        dataType: 'json',
        statusCode: {
            500: function (response) {
                msgProvider.send({ status: 'error', text: "Errore interno al server, contatta l'amministratore." });
            },
            200: function (response) {
                msgProvider.send({ status: response.alert, text: response.message });
                callback();
            }
        }
    });
}

function showTextareaTip() {
    msgProvider.send({ status: 'info', text: "É possibile creare una lista per questo campo. Inserire per ogni elemento della lista il carattere § all'inizio di ogni frase.", duration: 10 });
}
