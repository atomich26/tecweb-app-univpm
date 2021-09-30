window.onload = () => {
    setTextareasCounters();
    loadAlert();
    loadBtn();
}

// <---- Funzioni per il counter delle textarea ----->
function setTextareasCounters() {

    // Seleziona tutte le textarea che hanno il counter
    const textareas = document.querySelectorAll('.ck-editor__main');
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

    if(form != null)
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

function loadAlert() {
    let alert = document.querySelector('.alert-message');

    if (typeof alert == undefined)
        setTimeout(() => {
            alert.style.display = "none";
        }, 5000);
}

// <----- Funzione per la gestione dell'immagine da caricare tramite form ------>

function loadImageProduct() {
    var preview_img = document.querySelector("input[type='file']");
    preview_img.addEventListener('input', () => {
        document.querySelector('#delete-preview-img').style.display = "block";
        document.querySelector('#product-preview-image').src= URL.createObjectURL(preview_img.files[0]);
    });   
}

function deletePreview(e){
    preview_img.value = null;
    document.querySelector('#product-preview-image').src = "#";
    document.querySelector('#delete-preview-img').style.display = "none";
}
// <------------------------------------->


// Funzioni per la selezione degli elementi in admin