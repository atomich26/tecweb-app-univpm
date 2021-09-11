window.onload = () => {
    setTextAreaCounter();
}

// <---- Funzioni per il counter delle textarea ----->
function setTextAreaCounter() {
    let textareas = document.querySelectorAll('textarea.input-data.with-counter');

    if (textareas != null || textareas.length != 0) {
        for (let i = 0; i < textareas.length; i++){
            countTextAreaLength(textareas[i]);
            textareas[i].addEventListener('input', e => {
                countTextAreaLength(e.target);
            });
        }
    }
}

function countTextAreaLength(element = null) {
    let counter = document.querySelector(`h4[data-name="counter-${element.getAttribute('name')}"]`);
    counter.childNodes[0].innerHTML = element.value.length;

    if (element.value.length > element.getAttribute('max-length'))
        counter.style.color = "red";
    else
        counter.style.color = "black";
}

// <------------------------------------->
