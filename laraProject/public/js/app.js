//Inizializza il provider per i messaggi di notifica 
var msgProvider = new MsgServiceProvider();

//Inizializza le funzioni da eseguire alla fine del caricamento del DOM.
$('document').ready(() => {
    windowLoadResponseMessage();
});

//Mostra un messaggio con le informazioni sulla ricerca
function showSearchTip() {
    msgProvider.send({ status: 'info', text: "Puoi cercare i prodotti per descrizione inserendo la parola chiave completa o parte di essa seguita dal carattere wildcard \'*\'.", duration: 10 });
}

// Assegna all'utente scelto i prodotti selezionati
function assignProdottiUtente() {
    sendRequestAssegnItems((rowsSelected, optionSelected, response) => {
        rowsSelected.find('td:nth-child(8)').text(optionSelected);
        rowsSelected.find('td:nth-child(9)').text(response.updated_at);
        $('#selector-all').prop("checked", false).change();
    });
}

// Assegna al centro assistenza scelto i tecnici selezionati
function assignUtentiCentro() {
    sendRequestAssegnItems((rowsSelected, optionSelected, response) => {
        rowsSelected.find('td:nth-child(10)').text(optionSelected);
        $('#selector-all').prop("checked", false).change();
    });
}

// Esegue una richiesta AJAX al server per l'assegnazione di elementi
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
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: $('#assign-btn').attr('data-url'),
        type: 'POST',
        dataType: 'json',
        data: {
            optionSelectedID: $('#assign-select').val(),
            items: checkedItems,
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

//crea un messaggio(se esiste), dopo il caricamento della pagina 
function windowLoadResponseMessage() {
    var metaMessage = $('meta[name="response-message"]');

    if (metaMessage.attr('content'))
        msgProvider.send({ status: metaMessage.attr('data-alert'), text: metaMessage.attr('content') });
}

//convalida la ricerca 
function validateSearch() {
    $('#search-form').submit((event) => {
        let keyword = $.trim($(event.target).find('input[type="text"]').val());
        
        if (!keyword || keyword.length == 0) {
            msgProvider.send({ status: 'warning', text: 'Inserisci una parola chiave per effettuare una ricerca.' });   
            return false;
        }
    });
}