//Inizializza il provider per i messaggi di notifica 
var msgProvider = new MsgServiceProvider();

//Inizializza le funzioni da eseguire alla fine del caricamento del DOM.
$('document').ready(() => {
    windowLoadResponseMessage();
    setupFaqButtons();
});

// <---- Funzioni per il counter delle textarea ----->
function setTextareasCounters() {

    // Seleziona tutte le textarea che hanno il counter
    const textareas = document.querySelectorAll('.ck-editor__editable');
    const form = document.querySelector('.form-admin-data');

    /*
     *  Per ogni textarea effettua un conteggio iniziale e
     *  poi assegna il metodo countTextAreaLength  come listener dell'evento input
     */

    if (typeof textareas == undefined || textareas.length > 0) {
        for (let i = 0; i < textareas.length; i++) {

            countTextareaLength(textareas[i]);

            textareas[i].addEventListener('input', e => {
                countTextareaLength(e.target);
            });
        }
    }

    if (form != null)
        form.addEventListener('reset', () => {
            for (let i = 0; i < textareas.length; i++) {
                textareas[i].value = "";
                countTextareaLength(textareas[i]);
            };
        });
}

/*
 *  Conta la lunghezza della textarea passata come argomento (t)
 *  e aggiorna il testo di <span> contenuto nell'elemento counter
 */
function countTextareaLength(t) {
    let counter = $(`h4[data-name="counter-${t.getAttribute('name')}"]`)[0];
    counter.childNodes[0].innerText = (t.value.length);

    if (t.value.length > t.getAttribute('max-length'))
        counter.style.color = "red";
    else
        counter.style.color = "black";
}

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

function showSearchTip() {
    msgProvider.send({ status: 'info', text: "Puoi cercare i prodotti per descrizione inserendo la parola chiave completa o parte di essa seguita dal carattere wildcard \'*\'.", duration: 10 });
}

function assegnaProdottiUtente() {
    let checkedItems = [];
    let userNameSelected = $('#assign-user-select option:selected').text();
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
            utenteID: $('#assign-user-select').val(),
            prodotti: checkedItems,
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
                rowsSelected.find('td:nth-child(8)').text(userNameSelected);
                rowsSelected.find('td:nth-child(9)').text(response.updated_at);
                $('#selector-all').prop("checked", false).change();
                msgProvider.send({ status: response.alert, text: response.message });
            }
        }
    });
}

function windowLoadResponseMessage() {
    var metaMessage = $('meta[name="response-message"]');

    if (metaMessage.attr('content'))
        msgProvider.send({ status: metaMessage.attr('data-alert'), text: metaMessage.attr('content') });
}

function setupFaqButtons() {
    $('.faq li .question').click(function () {
        $(this).find('.plus-minus-toggle').toggleClass('collapsed');
        $(this).parent().toggleClass('active');
    });
}
