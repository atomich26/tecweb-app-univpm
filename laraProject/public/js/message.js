class MsgServiceProvider {
    #current; #duration; #timeout;

    constructor() {
        this.#current = null;
        this.#duration = 6;
    }

    /**
     * Invia al MsgServiceProvider un messaggio di tipo oggetto js per la sua visualizzazione.
     * 
     * @param {object} msgObj messaggio da visualizzare.
     * @returns void
     */
    send(msgObj) {

        this.#stop();
        this.#current = new Message(msgObj);

        if (msgObj.hasOwnProperty('duration'))
            this.#duration = msgObj.duration;

        this.#start()

    }

    /**
     * Mostra il messaggio come HTML e avvia il timer di visualizzazione.
     * 
     * @returns void
     */
    #start() {

        if (this.#current == null)
            return;

        this.#current.show();

        this.#timeout = setTimeout(() => {
            this.#stop();
        }, this.#duration * 1000);
    }

    /**
     * Elimina il messaggio visualizzato e azzera il timer.
     * 
     * @returns void
     */
    #stop() {

        if (this.#current == null)
            return;

        clearTimeout(this.#timeout);
        this.#current.close();
        this.#current = null;
    }
}

class Message {
    #nodeMsg;

    // Costruttore per la classe Message
    constructor(content) {
        if (typeof content == 'undefined' || typeof content != 'object' || !content.hasOwnProperty('status') || !content.hasOwnProperty('text'))
            return null;

        this.#nodeMsg = this.#createMessage(content);
    }

    /**
     * Crea l'oggetto Nodo del messaggio da inserire nel DOM.
     * 
     * @param {*} obj messaggio da creare.
     * @returns oggetto Node
     */
    #createMessage(obj) {
        //Crea il box del messaggio
        const htmlMessage = document.createElement('div');
        htmlMessage.classList.add('alert-box', obj.status);

        // Crea il testo del messaggio
        const messageText = document.createElement('h4');
        messageText.classList.add('alert-message');
        messageText.innerHTML = obj.text;

        // Crea l'icona del messaggio
        const iconMessage = document.createElement('i');

        const statusIcon = (statusClass) => {
            switch (statusClass) {
                case 'successful':
                    return 'bi-check2-circle'; break;
                case 'error':
                    return 'bi-x-circle'; break;
                case 'warning':
                    return 'bi-exclamation-triangle'; break;
                default:
                    return 'bi-info-circle'; break;
            }
        };

        iconMessage.classList.add('bi', statusIcon(obj.status));

        // Crea il messaggio completo
        htmlMessage.insertBefore(iconMessage, htmlMessage.appendChild(messageText));

        return htmlMessage;
    }

    /**
     * Mostra il messaggio come nodo del DOM.
     * 
     * @returns void
     */
    show() {
        document.body.appendChild(this.#nodeMsg);

        setTimeout(() => {
            this.#nodeMsg.classList.add('active');
        }, 200);
    }

    /**
     * Chiude il messaggio ed elimina il nodo del DOM.
     * 
     * @returns void
     */
    close() {
        this.#nodeMsg.classList.remove('active');

        setTimeout(() => {
            document.body.removeChild(this.#nodeMsg);
        }, 200);
    }
}