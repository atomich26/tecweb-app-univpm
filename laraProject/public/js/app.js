//Inizializza il provider per i messaggi di notifica 
var msgProvider = new MsgServiceProvider();

//Inizializza le funzioni da eseguire alla fine del caricamento del DOM.
$('document').ready(() => {
    windowLoadResponseMessage();
});

// <---- Funzioni per il counter delle textarea ----->

function showSearchTip() {
    msgProvider.send({ status: 'info', text: "Puoi cercare i prodotti per descrizione inserendo la parola chiave completa o parte di essa seguita dal carattere wildcard \'*\'.", duration: 10 });
}

function assignProdottiUtente() {
    sendRequestAssegnItems((rowsSelected, optionSelected, response) => {
        rowsSelected.find('td:nth-child(8)').text(optionSelected);
        rowsSelected.find('td:nth-child(9)').text(response.updated_at);
        $('#selector-all').prop("checked", false).change();
    });
}

function assignUtentiCentro() {
    sendRequestAssegnItems((rowsSelected, optionSelected, response) => {
        rowsSelected.find('td:nth-child(10)').text(optionSelected);
        $('#selector-all').prop("checked", false).change();
    });
}

function sendRequestAssegnItems(callback) {
    let checkedItems = [];
    let optionSelected = $('#assign-select option:selected').text();
    let rowsSelected = $('.table tbody tr').filter(':has(:checkbox:checked)');
    
    rowsSelected.each(function () {
        checkedItems.push($(this).find('input[type="checkbox"]').val());
    });

    if (!confirm('Sei sicuro di voler procedere con l\'assegnazione?'))
        return;

    $.ajax({
        url: $('#assign-btn').attr('data-url'),
        type: 'POST',
        dataType: 'json',
        data: {
            optionSelectedID: $('#assign-select').val(),
            items: checkedItems,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        statusCode: {
            400: function (response) {
                msgProvider.send({ status: response.responseJSON.alert, text: response.responseJSON.message});
            },
            500: function (response) {
                msgProvider.send({ status: 'error', text: "Errore interno al server, contatta l'amministratore." });
            },
            200: function (response) {
                msgProvider.send({ status: response.alert, text: response.message });
                callback(rowsSelected, optionSelected, response);
            }
        }
    });
}

function windowLoadResponseMessage() {
    var metaMessage = $('meta[name="response-message"]');

    if (metaMessage.attr('content'))
        msgProvider.send({ status: metaMessage.attr('data-alert'), text: metaMessage.attr('content') });
}

function loadImageProduct() {
    var imageItem = $("input[type='file']#image-item");
    
    if (imageItem == null)
        return;
    
    imageItem.addEventListener('input', () => {
        $('#delete-item-img').css('display', 'block');
        $('#product-preview-image').attr('src', URL.createObjectURL(preview_img.files[0]));
    });

    msgProvider.send({ status: 'successful', text: 'Immagine caricata' });
}

function deletePreview() {
    preview_img.value = null;
    $('#product-preview-image').attr('src', '#');
    $('#delete-preview-img').css('display', 'none');
    msgProvider.send({ status: 'successful', text: 'Immagine eliminata' });
}

function deleteCurrent(event) {
    const imgPreview = $('#product-preview-image');

    if (imgPreview.attr('src') == '' || imgPreview.attr('src') == null)
        return;
    
    if (!confirm("Sicuro di rimuovere l'immagine attuale? L'operazione non è reversibile."))
        return;
    
    $.ajax({
        url: $('#delete-current-img').attr('data-url'),
        type: 'POST',
        dataType: 'json',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        statusCode: {
            400: function (response) {
                msgProvider.send({ status: response.responseJSON.alert, text: response.responseJSON.message});
            },
            500: function (response) {
                msgProvider.send({ status: 'error', text: "Errore interno al server, contatta l'amministratore." });
            },
            200: function (response) {
                msgProvider.send({ status: response.alert, text: response.message });
                imgPreview.attr('src', '#');
            }
        }
    });
}

function showTextareaTip() {
    msgProvider.send({ status: 'info', text: "É possibile creare una lista per questo campo. Inserire per ogni elemento della lista il carattere § all'inizio di ogni frase.", duration: 10 });
}

function validateSearch() {
    $('#search-form').submit((event) => {
        let keyword = $.trim($(event.target).find('input[type="text"]').val());
        
        if (!keyword || keyword.length == 0) {
            msgProvider.send({ status: 'warning', text: 'Inserisci una parola chiave per effettuare una ricerca.' });   
            return false;
        }
    });
}