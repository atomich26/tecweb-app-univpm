@extends('layouts.static', ['title' => 'Chi siamo', 'pageCover' => 'corporate_cover.jpg'])

@section('static-content')
    <div id="chi-siamo" class="cit">
        <h2>Questi siamo noi</h2>
        <p>La nostra storia ha inizio nel 1955, nel periodo in cui gli elettrodomestici diventano oggetti indispensabili in ogni casa. Da allora siamo diventati il brand di elettrodomestici a libera installazione più richiesto d'Italia.
            Negli ultimi vent'anni, ci siamo concentrati sull'innovazione per rendere la vita dei nostri clienti più semplice e più sana. La facilità d'uso e le tecnologie funzionali dei nostri prodotti ci hanno reso il marchio Electrohm con la crescita più rapida sul mercato nazionale.
    </div>

    <div id="politiche-aziendali" class="missions">
        <div class="col">
            <img src="{{ asset('storage/images/contents/sostenibilità.jpg') }}">
            <h2>Agire in modo sostenibile</h2>
            <p>Andiamo al lavoro ogni giorno determinati a contribuire a uno stile di vita migliore per i nostri clienti e per la salute del nostro pianeta. Siamo orgogliosi dei traguardi raggiunti e della nostra eredità scandinava e siamo decisi a migliorare ulteriormente; a rendere accessibili a tutti soluzioni più intelligenti ed efficienti nell’uso delle risorse.</p>
        </div>
        <div class="col">
            <img src="{{ asset('storage/images/contents/esperienze.jpg') }}">
            <h2>Creare esperienze migliori</h2>
            <p>La vita è fatta di esperienze: nei cibi che i nostri clienti portano sulle loro tavole, nel modo in cui si prendono cura dei loro capi, nella qualità dell'aria che respirano o dell'acqua che bevono. Crediamo che esperienze migliori non solo arricchiscano la vita dei nostri clienti, ma che rispettino anche la società e il nostro pianeta.</p>
        </div>
        <div class="col">
            <img src="{{ asset('storage/images/contents/migliorare.jpg') }}">
            <h2>Migliorare sempre</h2>
            <p>Fa parte del nostro DNA non accontentarci mai, essere sempre curiosi e orientati all'apprendimento. Poniamo le domande difficili, vediamo opportunità dove gli altri vedono problemi e facciamo sì che le cose accadano. Perchè questo è quello che serve per contribuire a uno stile di vita migliore: idee, determinazione e la forza di 56'000 dipendenti artefici del cambiamento distribuiti in tutto il mondo.</p>
        </div>
    </div>

    <div id="cosa-crediamo" class="cit">
        <h2>In cosa crediamo</h2>
        <p>Crediamo che esperienze di gusto eccezionali debbano essere alla portata di tutti, che ci sia sempre un modo migliore per prenderci cura dei capi e farli sembrare nuovi più a lungo, che la casa debba essere un'oasi di benessere, dove prenderci cura di noi stessi e dei nostri cari. Per avere successo, ripensiamo e miglioriamo continuamente il nostro modo di lavorare, sia internamente sia insieme con i nostri clienti e partner. Con la creazione di soluzioni desiderabili e fantastiche esperienze in grado di arricchire la vita quotidiana delle persone e migliorare la salute del nostro pianeta, vogliamo essere una forza trainante nella definizione di uno stile di vita piacevole e sostenibile.
    </div>
    
    <div id="contatti">
        <h1 class="text-title" style="flex-basis:100%">Come contattarci e dove trovarci</h1>
        <div class="flex-v-center">
            <div style="height:450px" class="col">
                <p><img style="height: -moz-fit-content; height: fit-content; margin:40px 0"src="{{ asset('images/electrohm_logo_cover.svg') }}" width="300px" height="300px"></p>
                <ul style="padding-left: 20px;">
                    <li>Electrohm S.p.a, Piazza Liberty Milano 20121 Italia</li>
                    <li>Email: supporto@electrohm.com</li>
                    <li>Numero verde: 0912 1232 98</li>
                </ul>
            </div>
            <div class="col">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d370.57562440522787!2d9.193946068276682!3d45.4654866364335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786c6afbd1b7bc1%3A0x2f035d424bb604de!2sPiazza%20del%20Liberty%2C%2020121%20Milano%20MI!5e0!3m2!1sit!2sit!4v1629492474229!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <div id="lavora-con-noi">
        <h1 class="text-title">Lavora con noi</h1>
        <p>In Electrohm apprezziamo l'entusiamo e la voglia di far sentire il cliente a casa sua e sicuro dei nostri acquisti. In Electrohm sono aperte posizione come membri dello staff(gestiti direttamente da Noi) e come tecnici di centri di assistenza esterni che hanno accesso ai nostri servizi di Helpdesk.
            Se sei interessato a questa opportunità puoi inviare la tua candidatura all'indirizzo <strong>email candidate@jobs.electrohm.com</strong>.
        </p>
    </div>
@endsection