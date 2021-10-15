<?php

use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('faqs')->insert([
            'ID'=> 1,
            'domanda'=>'Posso acquistare pezzi di ricambio da questo sito?',
            'risposta'=>'Questo portale è adibito alla sola consultazione della documentazione neccessaria alla risoluzione dei guasti. Vendita di pezzi di ricambio ai privati non è al momento concessa.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('faqs')->insert([
            'ID'=> 2,
            'domanda'=>'Dove posso acquistare i prodotti qui presenti',
            'risposta'=>'I prodotti possono essere acquistati nelle nostre sedi principali o nei negozi specializzati stanziati in tutta Italia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=> 3,
            'domanda'=>'Non trovo ancona una soluzione al malfunzionamento nella documentazione fornita. Cosa posso fare?',
            'risposta'=>'Contatti il nostro centro, un nostro membro dello staff la contatterà al più presto per concordare una visita ed un eventuale ritiro.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=> 4,
            'domanda'=>'Ho bisogno di conoscere il prezzo di listino di un ricambio originale. Come posso fare?',
            'risposta'=>"Occorre contattare un Servizio di Assistenza Termotecnica autorizzato Electrohm che può comunicarLe il prezzo del ricambio necessario sulla base del “Listino prezzi parti di ricambio” attualmente in vigore che potrà visionare durante l’intervento di riparazione.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=> 5,
            'domanda'=>'Non trovo ancona una soluzione al malfunzionamento nella documentazione fornita. Cosa posso fare?',
            'risposta'=>'Contatti il nostro centro, nn nostro membro dello staff la contatterà al più presto per concordare una visita ed un eventuale ritiro.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=> 6,
            'domanda'=>'Ci sono dei costi di spedizione, se invio il mio elettrodomestico alla riparazione?',
            'risposta'=>'Utilizzando il servizio Electrohm Assistant la presa e la restituzione dell’utensile sono sempre gratuite, anche in caso di riparazione a pagamento.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=> 7,
            'domanda'=> "Quali costi devo sostenere se il mio elettrodomestico non è più in garanzia?",
            'risposta'=>"Decorso il periodo di garanzia o non sussistendo le condizioni, per ogni riparazione riceverai un preventivo del costo della riparazione. Utilizzando il servizio Riparazioni Online riceverai il preventivo via e-mail con la possibilità di accettarlo (ed effettuare contestualmente il pagamento Online) oppure rifiutarlo scegliendo la rottamazione (gratuita) presso il Centro Riparazioni Electrohm o la restituzione dell’utensile smontato (a norma di legge) pagando un forfait.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=> 8,
            'domanda'=> "Come posso smaltire il mio utensile?",
            'risposta'=> "Gli elettroutensili e le batterie, ricaricabili e non, domestici possono essere consegnati gratuitamente presso le apposite aree comunali (isole ecologiche) più vicine. In ottemperanza a quanto previsto dal Decreto Ministeriale 65/2010 e dal Decreto Legislativo 49/2014 (cosiddetto “1 contro 1”), i vecchi elettroutensili domestici possono anche essere riconsegnati, senza alcun costo, all’atto dell’acquisto di un utensile nuovo equivalente presso il vostro rivenditore di fiducia.
                Dal 2016, con il Decreto Ministeriale 121/2016 sull’ “1 contro 0”, le piccole apparecchiature elettriche ed elettroniche domestiche (dimensioni massime di 25 centimetri per il lato lungo) possono essere consegnate gratuitamente presso gli esercizi commerciali con superficie superiore a 400 metri quadrati senza alcun obbligo d’acquisto. ",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=> 9,
            'domanda'=> "Quali sono le condizioni di garanzia per utensili utilizzati privatamente? ",
            'risposta'=> "La garanzia per l'uso privato di un utensile nuovo è di 24 mesi. I nostri clienti hanno una garanzia anche su utensili riparati. Informazioni più dettagliate sono riportate nelle attuali Condizioni di garanzia.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=>10,
            'domanda'=> "Ho diritto a una prestazione in garanzia dopo una riparazione?",
            'risposta' => "Dopo una riparazione a pagamento si ha diritto a una garanzia di 6 mesi.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=>11,
            'domanda'=> "Quali sono le condizioni di garanzia per gli utensili utilizzati professionalmente?",
            'risposta' => "La garanzia per l'uso professionale di un utensile nuovo è di dodici mesi. I clienti hanno una garanzia anche su utensili riparati. Per gli elettroutensili professionali della Linea Professionale è possibile estendere la garanzia a 36 mesi. A tale scopo devi registrare in Internet il tuo utensile entro quattro settimane dalla data di acquisto.
                Informazioni più dettagliate sono riportate nelle attuali Condizioni di garanzia.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=>12,
            'domanda'=> "Lo smaltimento di vecchi apparecchi e batterie è gratuito? ",
            'risposta' => "In base al principio di Responsabilità Estesa del Produttore (Decreto Legislativo 49/2014 e Decreto Legislativo 188/2008), Electrohm Italia finanzia interamente la gestione del fine vita dei propri prodotti, incluse le operazioni di raccolta, cernita e trattamento, affidandosi a sistemi collettivi di raccolta.
                Gli elettroutensili e le batterie, ricaricabili e non, domestici possono essere consegnati gratuitamente presso le apposite aree comunali (isole ecologiche) più vicine.
                In ottemperanza a quanto previsto dal Decreto Ministeriale 65/2010 e dal Decreto Legislativo 49/2014 (cosiddetto “1 contro 1”), i vecchi elettroutensili domestici possono anche essere riconsegnati, senza alcun costo, all’atto dell’acquisto di un utensile nuovo equivalente presso il vostro rivenditore di fiducia. 
                Dal 2016, con il Decreto Ministeriale 121/2016 sull’ “1 contro 0”, le piccole apparecchiature elettriche ed elettroniche domestiche (dimensioni massime di 25 centimetri per il lato lungo) possono essere consegnate gratuitamente presso gli esercizi commerciali con superficie superiore a 400 metri quadrati senza alcun obbligo d’acquisto. ",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=>13,
            'domanda'=> "Come devo imballare il mio utensile?",
            'risposta' => "Per evitare danni durante il trasporto, imballa accuratamente l'utensile in una scatola di cartone adatta, possibilmente utilizzando l’imballo originale.
                Per utensili contenenti batterie al litio leggere attentamente le istruzioni che riceverai via e-mail allegate alla conferma d’ordine di riparazione.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=>14,
            'domanda'=> "Perché non riesco a ordinare la parte di ricambio che desidero? ",
            'risposta' => "Se la parte di ricambio necessaria venisse rimossa dal carrello durante l'ordine significa che è momentaneamente indisponibile.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
 