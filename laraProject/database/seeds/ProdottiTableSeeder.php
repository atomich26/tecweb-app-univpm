<?php

use Illuminate\Database\Seeder;

class ProdottiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodotti')->insert([
            'ID'=> 1,
            'nome'=> 'Lavatrice Serie 6 ProSmart™, 8 kg, 1400 giri/min',
            'modello'=> 'WUU24T29IT',
            'categoriaID'=> 1,
            'descrizione'=> "La lavatrice Electrohm ProSmart™ EPT8C4IT non pesa sulla bolletta e non ti causa il mal di testa ogni volta che devi lavare i tuoi vestiti. Grazie al design con motore brushless,
                ProSmart™ offre un'elevata efficienza energetica, ridotti livelli acustici e maggiore durata nel tempo, il tutto in un'unica soluzione. Così otterrai il massimo dalla tua lavatrice,
                senza intaccare il tuo budget mensile e in totale serenità. Inoltre con il vetro curvo dell'oblò e l'esclusivo moto ondoso prodotto dalle pale all'interno del cestello, il sistema AquaWave® tratta i capi più delicatamente migliorandone il lavaggio.
                Così la prossima volta che ti faranno i complimenti per quello che indossi, potrai veramente dire 'Ce l'ho da anni!'.",
            'specifiche'=> "§ Altezza: 84cm, Larghezza: 60cm, Profondità: 55cm § Capacità max. di carico: 8kg § Rumorosità di lavaggio: 55dBA § Rumorosità di centrifuga: 76dbA § Velocità Massima di centrifuga: 1400 giri/min § Classe di efficienza energetica: C",
            'guida_installazione'=> "§ Rivolgersi al più vicino agente autorizzato per l'assistenza per l'installazione dell'elettrodomestico.
                § La preparazione del luogo e le installazioni elettriche, idriche e dell'acqua di scarico sul luogo dell' installazione sono una responsabilità del cliente. § Assicurarsi che i flessibili di ingresso e scarico dell'acqua nonché il cavo di alimentazione non siano piegati, schiacciati o strappati quando si riposiziona l'elettrodomestico dopo le procedure di installazione o pulizia. § Far eseguire installazione e collegamenti elettrici dell'apparecchio dall'agente autorizzato per l'assistenza.Il produttore non sarà ritenuto responsabile per danni che possono derivare da procedure eseguite da persone non autorizzate
                § Posizionare l'elettrodomestico su una superficie rigida e uniforme. Non collocarlo su un tappeto con superficie in pile alta o simili. Il peso totale di lavatrice e asciugatrice - a pieno carico - quando sono poste l'una sull'altra raggiunge circa 180 kg. Mettere l'elettrodomestico su una superficie solida e piana che abbia una sufficiente capacità disopportare il carico!
                § Non posizionare l'elettrodomestico sul cavo di alimentazione. § Non installare l'elettrodomestico in ambienti in cui la temperatura può scendere al di sotto di 0
                § Allentare tutti i bulloni con una chiave adeguata finché non ruotano in modo libero. § Rimuovere i bulloni di sicurezza di trasporto ruotandoli leggermente.
                § Collegare l'elettrodomestico alla fornitura idrica serrando manualmente i dadi del tubo flessibile. Non usare mai un attrezzo per stringere i dadi.
                § Collegare l’estremità del flessibile di scarico direttamente alla fognatura, al lavandino o alla vasca
                § Collegare l'elettrodomestico a una presa di messa a terra protetta da fusibile 16 A. La nostra azienda non sarà responsabile dei danni derivanti dall'uso dell'elettrodomestico senza la messa a terra conforme ai regolamenti locali.
            ",
            'note_uso'=> "§ Non mettere mai l'elettrodomestico su un pavimento coperto da tappeto. Altrimenti la mancanza di aria sotto l'elettrodomestico provocherà il surriscaldamento delle parti elettriche. Ciò può provocare malfunzionamenti dell'elettrodomestico.
                § Scollegare il prodotto se non è in uso.
                § Far eseguire sempre le procedure di installazione e riparazione dall'agente autorizzato per l'assistenza.
                § Il produttore non sarà ritenuto responsabile perdanni che possono derivare da procedure eseguite da persone non autorizzate.
                § L'alimentazione dell'acqua e i flessibili di scarico devono essere montati inmodo sicuro e restare privi di danni. Altrimenti c'è il rischio di perdite di acqua.
                § Non aprire mai lo sportello né togliere il filtro mentre vi è ancora dell’acqua nel cestello. Diversamente, si  verifica il rischio di allagamenti e lesioni provocate dall'acqua calda.
                § Non forzare per aprire lo sportello di carico bloccato. Lo sportello si apre immediatamente al termine del ciclo di lavaggio. Forzare l’apertura dello sportello di carico bloccato può danneggiare sia lo sportello che il meccanismo di blocco.
                § Usare solo detersivi, ammorbidenti e additivi adatti alle lavatrici automatiche.
                § Seguire le istruzioni sulle etichette dei prodotti tessili e sulla confezione deldetersivo.
                § Non lavare mai l'elettrodomestico versando o cospargendo acqua su di esso! C'è il rischio di shock elettrico!
                § Non toccare mai la presa con le mani bagnate!
                § Non scollegare mai tirando dal cavo. Premere sempre sulla spina con una mano ed estrarre la spina afferrandola con l'altra mano",
            'utenteID'=> null,
            'file_img' => 'WUU24T29IT.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('prodotti')->insert([
            'ID'=> 2,
            'nome'=> 'Lavatrice Serie 8 a Vapore SteamCure™, 10 kg, 1400 giri/min ',
            'modello'=> 'WAW286H8IT',
            'categoriaID'=> 1,
            'descrizione'=> "Prova la nuova Tecnologia SteamCure™ per un igiene a tutto vapore! Rilasciato a 60° dal fondo del cestello, il vapore agisce prima o dopo la fase di lavaggio a seconda del ciclo selezionato, per offrire un beneficio igienizzante, antimacchia o antipiega. Prova la sua efficacia
                igienizzante associandolo al programma Hygiene+ per eliminare il 99,99% degli allergeni e il 97,8% di batteri e funghi - testato da Allergy UK. Non domandarti più se stai usando abbastanza detersivo o se devi aggiungerlo prima di ogni lavaggio. Aggiungi il detersivo liquido e l'ammorbidente, e AutoDose doserà la giusta quantità per ogni programma. Risultato? Avrai un bucato splendente a ogni lavaggio e potrai quasi dimenticarti del detersivo.
                Non devi neanche più stressarti per la bolletta dell'energia o farti venire il mal di testa ogni volta che devi lavare i tuoi vestiti. Grazie al design con motore brushless, ProSmart™ offre un'elevata efficienza energetica, ridotti livelli acustici e maggiore durata nel tempo,
                il tutto in un'unica soluzione. Così otterrai il massimo dalla tua lavatrice, senza intaccare il tuo budget mensile e in totale serenità.
                ",
            'specifiche'=> "§ Altezza: 84cm, Larghezza: 60cm, Profondità: 64cm § Capacità max. di carico: 10kg § Rumorosità di lavaggio: 53dBA § Rumorosità di centrifuga: 75dbA § Velocità Massima di centrifuga: 1400 giri/min § Classe di efficienza energetica: B",
            'guida_installazione'=> "§ Rivolgersi al più vicino agente autorizzato per l'assistenza per l'installazione dell'elettrodomestico.
                § La preparazione del luogo e le installazioni elettriche, idriche e dell'acqua di scarico sul luogo dell' installazione sono una responsabilità del cliente. § Assicurarsi che i flessibili di ingresso e scarico dell'acqua nonché il cavo di alimentazione non siano piegati, schiacciati o strappati quando si riposiziona l'elettrodomestico dopo le procedure di installazione o pulizia. § Far eseguire installazione e collegamenti elettrici dell'apparecchio dall'agente autorizzato per l'assistenza.Il produttore non sarà ritenuto responsabile per danni che possono derivare da procedure eseguite da persone non autorizzate
                § Posizionare l'elettrodomestico su una superficie rigida e uniforme. Non collocarlo su un tappeto con superficie in pile alta o simili. Il peso totale di lavatrice e asciugatrice - a pieno carico - quando sono poste l'una sull'altra raggiunge circa 180 kg. Mettere l'elettrodomestico su una superficie solida e piana che abbia una sufficiente capacità disopportare il carico!
                § Non posizionare l'elettrodomestico sul cavo di alimentazione. § Non installare l'elettrodomestico in ambienti in cui la temperatura può scendere al di sotto di 0
                § Allentare tutti i bulloni con una chiave adeguata finché non ruotano in modo libero. § Rimuovere i bulloni di sicurezza di trasporto ruotandoli leggermente.
                § Collegare l'elettrodomestico alla fornitura idrica serrando manualmente i dadi del tubo flessibile. Non usare mai un attrezzo per stringere i dadi.
                § Collegare l’estremità del flessibile di scarico direttamente alla fognatura, al lavandino o alla vasca
                § Collegare l'elettrodomestico a una presa di messa a terra protetta da fusibile 16 A. La nostra azienda non sarà responsabile dei danni derivanti dall'uso dell'elettrodomestico senza la messa a terra conforme ai regolamenti locali.
            ",
            'note_uso'=> "§ Non mettere mai l'elettrodomestico su un pavimento coperto da tappeto. Altrimenti la mancanza di aria sotto l'elettrodomestico provocherà il surriscaldamento delle parti elettriche. Ciò può provocare malfunzionamenti dell'elettrodomestico.
                § Scollegare il prodotto se non è in uso.
                § Far eseguire sempre le procedure di installazione e riparazione dall'agente autorizzato per l'assistenza.
                § Il produttore non sarà ritenuto responsabile perdanni che possono derivare da procedure eseguite da persone non autorizzate.
                § L'alimentazione dell'acqua e i flessibili di scarico devono essere montati inmodo sicuro e restare privi di danni. Altrimenti c'è il rischio di perdite di acqua.
                § Non aprire mai lo sportello né togliere il filtro mentre vi è ancora dell’acqua nel cestello. Diversamente, si  verifica il rischio di allagamenti e lesioni provocate dall'acqua calda.
                § Non forzare per aprire lo sportello di carico bloccato. Lo sportello si apre immediatamente al termine del ciclo di lavaggio. Forzare l’apertura dello sportello di carico bloccato può danneggiare sia lo sportello che il meccanismo di blocco.
                § Usare solo detersivi, ammorbidenti e additivi adatti alle lavatrici automatiche.
                § Seguire le istruzioni sulle etichette dei prodotti tessili e sulla confezione deldetersivo.
                § Non lavare mai l'elettrodomestico versando o cospargendo acqua su di esso! C'è il rischio di shock elettrico!
                § Non toccare mai la presa con le mani bagnate!
                § Non scollegare mai tirando dal cavo. Premere sempre sulla spina con una mano ed estrarre la spina afferrandola con l'altra mano",
            'file_img' => 'WAW286H8IT.png',
            'utenteID'=> 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('prodotti')->insert([
            'ID'=>3,
            'nome'=> 'Lavatrice HomeProfessional i-Dos™, 10kg, 1600 giri/min',
            'modello'=> 'WAX32EH0II',
            'categoriaID'=> 1,
            'descrizione'=> "La lavatrice Home Professional i-Dos™ con le funzioni Home Connect e Anti macchia Plus è confortevole ed efficiente perchè fa tutto automaticamente. Nei programmi automatici i parametri del lavaggio vengono automaticamente regolati in funzione del tipo di tessuto e del grado di sporco del bucato caricato e con l'aiuto del 4D Wash System, un efficiente sistema di irrorazione del bucato, la distribuzione del detersivo è più uniforme e più profonda. ",
            'specifiche'=> "§ Altezza: 84.8cm, Larghezza: 59.8cm, Profondità: 59cm § Capacità max. di carico: 10kg § Rumorosità di lavaggio: 48dBA § Rumorosità di centrifuga: 74dbA § Velocità Massima di centrifuga: 1600 giri/min § Classe di efficienza energetica: C",
            'guida_installazione'=> "§ Rivolgersi al più vicino agente autorizzato per l'assistenza per l'installazione dell'elettrodomestico.
                § La preparazione del luogo e le installazioni elettriche, idriche e dell'acqua di scarico sul luogo dell' installazione sono una responsabilità del cliente. § Assicurarsi che i flessibili di ingresso e scarico dell'acqua nonché il cavo di alimentazione non siano piegati, schiacciati o strappati quando si riposiziona l'elettrodomestico dopo le procedure di installazione o pulizia. § Far eseguire installazione e collegamenti elettrici dell'apparecchio dall'agente autorizzato per l'assistenza.Il produttore non sarà ritenuto responsabile per danni che possono derivare da procedure eseguite da persone non autorizzate
                § Posizionare l'elettrodomestico su una superficie rigida e uniforme. Non collocarlo su un tappeto con superficie in pile alta o simili. Il peso totale di lavatrice e asciugatrice - a pieno carico - quando sono poste l'una sull'altra raggiunge circa 180 kg. Mettere l'elettrodomestico su una superficie solida e piana che abbia una sufficiente capacità disopportare il carico!
                § Non posizionare l'elettrodomestico sul cavo di alimentazione. § Non installare l'elettrodomestico in ambienti in cui la temperatura può scendere al di sotto di 0
                § Allentare tutti i bulloni con una chiave adeguata finché non ruotano in modo libero. § Rimuovere i bulloni di sicurezza di trasporto ruotandoli leggermente.
                § Collegare l'elettrodomestico alla fornitura idrica serrando manualmente i dadi del tubo flessibile. Non usare mai un attrezzo per stringere i dadi.
                § Collegare l’estremità del flessibile di scarico direttamente alla fognatura, al lavandino o alla vasca
                § Collegare l'elettrodomestico a una presa di messa a terra protetta da fusibile 16 A. La nostra azienda non sarà responsabile dei danni derivanti dall'uso dell'elettrodomestico senza la messa a terra conforme ai regolamenti locali.
            ",
            'note_uso'=> "§ Non mettere mai l'elettrodomestico su un pavimento coperto da tappeto. Altrimenti la mancanza di aria sotto l'elettrodomestico provocherà il surriscaldamento delle parti elettriche. Ciò può provocare malfunzionamenti dell'elettrodomestico.
                § Scollegare il prodotto se non è in uso.
                § Far eseguire sempre le procedure di installazione e riparazione dall'agente autorizzato per l'assistenza.
                § Il produttore non sarà ritenuto responsabile perdanni che possono derivare da procedure eseguite da persone non autorizzate.
                § L'alimentazione dell'acqua e i flessibili di scarico devono essere montati inmodo sicuro e restare privi di danni. Altrimenti c'è il rischio di perdite di acqua.
                § Non aprire mai lo sportello né togliere il filtro mentre vi è ancora dell’acqua nel cestello. Diversamente, si  verifica il rischio di allagamenti e lesioni provocate dall'acqua calda.
                § Non forzare per aprire lo sportello di carico bloccato. Lo sportello si apre immediatamente al termine del ciclo di lavaggio. Forzare l’apertura dello sportello di carico bloccato può danneggiare sia lo sportello che il meccanismo di blocco.
                § Usare solo detersivi, ammorbidenti e additivi adatti alle lavatrici automatiche.
                § Seguire le istruzioni sulle etichette dei prodotti tessili e sulla confezione deldetersivo.
                § Non lavare mai l'elettrodomestico versando o cospargendo acqua su di esso! C'è il rischio di shock elettrico!
                § Non toccare mai la presa con le mani bagnate!
                § Non scollegare mai tirando dal cavo. Premere sempre sulla spina con una mano ed estrarre la spina afferrandola con l'altra mano",
            'file_img' => 'WAX32EH0II.png',
            'utenteID'=> 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('prodotti')->insert([
            'ID'=>4,
            'nome'=> 'Asciugatrice Serie 6 a pompa di calore 9 kg',
            'modello'=> 'WTW85T09IT',
            'categoriaID'=> 1,
            'descrizione'=> "Asciugatrice con condensatore autopulente: si pulisce da sola e mantiene sempre la massima efficienza. Dotata di tecnologia AutoDry™, asciuga i capi delicatamente e automaticamente fino al preciso livello di asciugatura desiderato mantenendoli morbidi e curati grazie al Cestello Sensitive™. Tutto questo producendo meno rumore possibile con il Design antivibrazioni chestabilizza le pareti laterali e minimizza il rumore, garantendo un'asciugatura particolarmente silenziosa.",
            'specifiche'=> "§ Altezza: 84.2cm, Larghezza: 59.8cm, Profondità: 59.9cm § Capacità max. di carico: 9kg § Rumorosità: 64dBA § Tipologia: condensazione § Tecnologia: pompa di calore con gas R290 § Classe di efficienza energetica: A++",
            'guida_installazione'=> "§ Rivolgersi al più vicino agente autorizzato per l'assistenza per l'installazione dell'elettrodomestico.
                § La preparazione del luogo e le installazioni elettriche, idriche e dell'acqua di scarico sul luogo dell' installazione sono una responsabilità del cliente.
                § Assicurarsi che i flessibili di ingresso e scarico dell'acqua nonché il cavo di alimentazione non siano piegati, schiacciati o strappati quando si riposiziona l'elettrodomestico dopo le procedure di installazione o pulizia.
                § Far eseguire installazione e collegamenti elettrici dell'apparecchio dall'agente autorizzato per l'assistenza.Il produttore non sarà ritenuto responsabile per danni che possono derivare da procedure eseguite da persone non autorizzate
                § Posizionare l'elettrodomestico su una superficie rigida e uniforme. Non collocarlo su un tappeto con superficie in pile alta o simili. Il peso totale di lavatrice e asciugatrice - a pieno carico - quando sono poste l'una sull'altra raggiunge circa 180 kg. Mettere l'elettrodomestico su una superficie solida e piana che abbia una sufficiente capacità disopportare il carico!
                § Non posizionare l'elettrodomestico sul cavo di alimentazione. § Non installare l'elettrodomestico in ambienti in cui la temperatura può scendere al di sotto di 0
                § Allentare tutti i bulloni con una chiave adeguata finché non ruotano in modo libero. § Rimuovere i bulloni di sicurezza di trasporto ruotandoli leggermente.
                § Collegare l'elettrodomestico alla fornitura idrica serrando manualmente i dadi del tubo flessibile. Non usare mai un attrezzo per stringere i dadi.
                § Collegare l’estremità del flessibile di scarico direttamente alla fognatura, al lavandino o alla vasca
                § Collegare l'elettrodomestico a una presa di messa a terra protetta da fusibile 16 A. La nostra azienda non sarà responsabile dei danni derivanti dall'uso dell'elettrodomestico senza la messa a terra conforme ai regolamenti locali.
            ",
            'note_uso'=> "§ Non mettere mai l'elettrodomestico su un pavimento coperto da tappeto. Altrimenti la mancanza di aria sotto l'elettrodomestico provocherà il surriscaldamento delle parti elettriche. Ciò può provocare malfunzionamenti dell'elettrodomestico.
                § Scollegare il prodotto se non è in uso.§ Far eseguire sempre le procedure di installazione e riparazione dall'agente autorizzato per l'assistenza.
                § Il produttore non sarà ritenuto responsabile perdanni che possono derivare da procedure eseguite da persone non autorizzate.
                § L'alimentazione dell'acqua e i flessibili di scarico devono essere montati inmodo sicuro e restare privi di danni. Altrimenti c'è il rischio di perdite di acqua.
                § Non aprire mai lo sportello né togliere il filtro mentre vi è ancora dell’acqua nel cestello. Diversamente, si  verifica il rischio di allagamenti e lesioni provocate dall'acqua calda.
                § Non forzare per aprire lo sportello di carico bloccato. Lo sportello si apre immediatamente al termine del ciclo di lavaggio. Forzare l’apertura dello sportello di carico bloccato può danneggiare sia lo sportello che il meccanismo di blocco.
                § Usare solo detersivi, ammorbidenti e additivi adatti alle lavatrici automatiche.
                § Seguire le istruzioni sulle etichette dei prodotti tessili e sulla confezione deldetersivo.
                § Non lavare mai l'elettrodomestico versando o cospargendo acqua su di esso! C'è il rischio di shock elettrico!
                § Non toccare mai la presa con le mani bagnate!
                § Non scollegare mai tirando dal cavo. Premere sempre sulla spina con una mano ed estrarre la spina afferrandola con l'altra mano
            ",
            'file_img' => 'WTW85T09IT.png',
            'utenteID'=> 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('prodotti')->insert([
            'ID'=>5,
            'nome'=> 'Asciugatrice Serie 8 a pompa di calore 8 kg',
            'modello'=> 'WTW87568II',
            'categoriaID'=> 1,
            'descrizione'=> "Asciugatrice a pompa di calore con la massima efficienza energetica in classe A+++ e con il condensatore autopulente. Oltre alla tecnologia AuroDry™ e Cestello Sensisitve™, è dotata del Cestello Lana™ per un'asciugatura molto delicata, adatta ai capi in lana. Può essere usato anche per l'asciugatura delle scarpe da ginnastica o sportive. Tutto questo producendo meno rumore possibile con il Design antivibrazioni chestabilizza le pareti laterali e minimizza il rumore, garantendo un'asciugatura particolarmente silenziosa. ",
            'specifiche'=> "§ Altezza: 84.2cm, Larghezza: 59.8cm, Profondità: 59.9cm § Capacità max. di carico: 8kg § Rumorosità: 62dBA § Tipologia: condensazione § Tecnologia: pompa di calore con gas R290 § Classe di efficienza energetica: A+++",
            'guida_installazione'=> "§ Rivolgersi al più vicino agente autorizzato per l'assistenza per l'installazione dell'elettrodomestico.
                § La preparazione del luogo e le installazioni elettriche, idriche e dell'acqua di scarico sul luogo dell' installazione sono una responsabilità del cliente.
                § Assicurarsi che i flessibili di ingresso e scarico dell'acqua nonché il cavo di alimentazione non siano piegati, schiacciati o strappati quando si riposiziona l'elettrodomestico dopo le procedure di installazione o pulizia.
                § Far eseguire installazione e collegamenti elettrici dell'apparecchio dall'agente autorizzato per l'assistenza.Il produttore non sarà ritenuto responsabile per danni che possono derivare da procedure eseguite da persone non autorizzate
                § Posizionare l'elettrodomestico su una superficie rigida e uniforme. Non collocarlo su un tappeto con superficie in pile alta o simili. Il peso totale di lavatrice e asciugatrice - a pieno carico - quando sono poste l'una sull'altra raggiunge circa 180 kg. Mettere l'elettrodomestico su una superficie solida e piana che abbia una sufficiente capacità disopportare il carico!
                § Non posizionare l'elettrodomestico sul cavo di alimentazione. § Non installare l'elettrodomestico in ambienti in cui la temperatura può scendere al di sotto di 0
                § Allentare tutti i bulloni con una chiave adeguata finché non ruotano in modo libero. § Rimuovere i bulloni di sicurezza di trasporto ruotandoli leggermente.
                § Collegare l'elettrodomestico alla fornitura idrica serrando manualmente i dadi del tubo flessibile. Non usare mai un attrezzo per stringere i dadi.
                § Collegare l’estremità del flessibile di scarico direttamente alla fognatura, al lavandino o alla vasca
                § Collegare l'elettrodomestico a una presa di messa a terra protetta da fusibile 16 A. La nostra azienda non sarà responsabile dei danni derivanti dall'uso dell'elettrodomestico senza la messa a terra conforme ai regolamenti locali.
            ",
            'note_uso'=> "§ Non mettere mai l'elettrodomestico su un pavimento coperto da tappeto. Altrimenti la mancanza di aria sotto l'elettrodomestico provocherà il surriscaldamento delle parti elettriche. Ciò può provocare malfunzionamenti dell'elettrodomestico.
                § Scollegare il prodotto se non è in uso.§ Far eseguire sempre le procedure di installazione e riparazione dall'agente autorizzato per l'assistenza.
                § Il produttore non sarà ritenuto responsabile perdanni che possono derivare da procedure eseguite da persone non autorizzate.
                § L'alimentazione dell'acqua e i flessibili di scarico devono essere montati inmodo sicuro e restare privi di danni. Altrimenti c'è il rischio di perdite di acqua.
                § Non aprire mai lo sportello né togliere il filtro mentre vi è ancora dell’acqua nel cestello. Diversamente, si  verifica il rischio di allagamenti e lesioni provocate dall'acqua calda.
                § Non forzare per aprire lo sportello di carico bloccato. Lo sportello si apre immediatamente al termine del ciclo di lavaggio. Forzare l’apertura dello sportello di carico bloccato può danneggiare sia lo sportello che il meccanismo di blocco.
                § Usare solo detersivi, ammorbidenti e additivi adatti alle lavatrici automatiche.
                § Seguire le istruzioni sulle etichette dei prodotti tessili e sulla confezione deldetersivo.
                § Non lavare mai l'elettrodomestico versando o cospargendo acqua su di esso! C'è il rischio di shock elettrico!
                § Non toccare mai la presa con le mani bagnate!
                § Non scollegare mai tirando dal cavo. Premere sempre sulla spina con una mano ed estrarre la spina afferrandola con l'altra mano
            ",
            'file_img' => 'WTW87568II.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

}
