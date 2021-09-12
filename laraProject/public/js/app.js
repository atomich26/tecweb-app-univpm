window.onload = () => {
    setTextareasCounters();
}

// <---- Funzioni per il counter delle textarea ----->
function setTextareasCounters() {

    // Seleziona tutte le textarea che hanno il counter
    const textareas = document.querySelectorAll('textarea.input-data.with-counter');
    const form = document.querySelector('.form-admin-data');

    /*
     *  Per ogni textarea effettua un conteggio iniziale e
     *  poi assegna il metodo countTextAreaLength  come listener dell'evento input
     */

    if (textareas != null || textareas.length > 0) {
        for (let i = 0; i < textareas.length; i++) {

            countTextareaLength(textareas[i]);

            textareas[i].addEventListener('input', e => {
                countTextareaLength(e.target);
            });
        }
    }

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

// <------------------------------------->


// <----- Funzione per la gestione dell'immagine da caricare tramite form ------>



