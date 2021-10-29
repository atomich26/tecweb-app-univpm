<?php

use Illuminate\Database\Seeder;

class SoluzioniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('soluzioni')->insert([
            'ID'=>1,
            'malfunzionamentoID'=>1,
            'descrizione'=>'Controlla il tubo di scarico: 
                Rimuovi il tubo dal sifone e controlla che non sia ostruito, prova a far scaricare la macchina in un secchio.
                Se il problema persiste l’ostruzione è all’interno della lavatrice e perciò dovrà essere disassemblata per eliminare il blocco.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>2,
            'malfunzionamentoID'=>1,
            'descrizione'=>'Un altro motivo può per il blocco può essere il filtro.
            Svita il filtro e assicurati che non ci siano oggetti estranei all’interno. Inclina la lavatrice e usa un catino per rimuovere l’acqua.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>3,
            'malfunzionamentoID'=>2,
            'descrizione'=>'Controllare se la serratura dello sportello mostra difetti o danni che possono portare al malfunzionamento dell\'oblò.
            Se individuate un difetto, smontatelo e sostituitelo con un pezzo di ricambio omologo.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>4,
            'malfunzionamentoID'=>2,
            'descrizione'=>'Se all\'apertura notate acqua sul fondo del cestello, il problema sarà dato dal non corretto scarico dell\'acqua.
            Controllate perciò filtro e tubo di scarico.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>5,
            'malfunzionamentoID'=>2,
            'descrizione'=>'Se il display elettronico mostra un codice d\'errore, prego fare riferimento alla guida all\'utilizzo d cui il mezzo è munito.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>6,
            'malfunzionamentoID'=>3,
            'descrizione'=>'Se il display elettronico mostra un codice d\'errore, prego fare riferimento alla guida all\'utilizzo d cui il mezzo è munito.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>7,
            'malfunzionamentoID'=>4,
            'descrizione'=>'Controlla il tubo di scarico: 
            Rimuovi il tubo dal sifone e controlla che non sia ostruito, prova a far scaricare la macchina in un secchio.
            Se il problema persiste l’ostruzione è all’interno della lavatrice e perciò dovrà essere disassemblata per eliminare il blocco.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>8,
            'malfunzionamentoID'=>4,
            'descrizione'=>'Un altro motivo può per il blocco può essere il filtro.
            Svita il filtro e assicurati che non ci siano oggetti estranei all’interno. Inclina la lavatrice e usa un catino per rimuovere l’acqua.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>9,
            'malfunzionamentoID'=>5,
            'descrizione'=>'Fare un test senza carico, se il problema non si riscontra è molto probabile che il problema sia dovuto all\'eccessivo carico.
            Controllate se l\'utente abbia rispettato i limiti di carico indicati dalla casa produttrice.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>10,
            'malfunzionamentoID'=>5,
            'descrizione'=>'Se la centrifuga non parte o se il ciclo è irregolare, il problema può essere dato da un falso contatto del cavo d\'alimentazione. 
            Fare un test su questo ed eventualmente sostituitelo. Se con nuovo cavo d\'alimentazione omologo il problema persiste, il problema sarà nel circuito d\'alimentazione interno.
            Portate la macchina in sede per poter essere disassemblata e riparata.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>11,
            'malfunzionamentoID'=>5,
            'descrizione'=>'Se la frequenza della centrifuga è più bassa di quella dichiarata dal produttore, il problema può essere dato dal calcare accumulatosi all\'interno.
            Smontate il cestello ed esaminate la macchina. Se riscontrate sedimentazioni di calcare, portate il componente in sede per poter rimuovere il tutto.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>12,
            'malfunzionamentoID'=>6,
            'descrizione'=>'Controlla il tubo di scarico: 
            Rimuovi il tubo dal sifone e controlla che non sia ostruito, prova a far scaricare la macchina in un secchio.
            Se il problema persiste l’ostruzione è all’interno della lavatrice e perciò dovrà essere disassemblata per eliminare il blocco.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>13,
            'malfunzionamentoID'=>6,
            'descrizione'=>'Un altro motivo può per il blocco può essere il filtro.
            Svita il filtro e assicurati che non ci siano oggetti estranei all’interno. Inclina la lavatrice e usa un catino per rimuovere l’acqua.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>14,
            'malfunzionamentoID'=>7,
            'descrizione'=>'Controllare il contatore della luce, la carica supportata e gli apparecchi elettrici in funzione.
            Se arrivate alla conclusione che il carico elettrico dell\'asciugatrice porta la casa a superare il limite, date istruzione al cliente su comenovviare a questo problema.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>15,
            'malfunzionamentoID'=>7,
            'descrizione'=>'Controllate che l\'apparecchio non scarichi a terra. Se così fosse il problema và a trovarsi sulla circuiteria.
            L\'apparecchio dovrà essere smontato e la parte danneggiata sostituita.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>16,
            'malfunzionamentoID'=>8,
            'descrizione'=>'Controllate se l\'apparecchio è stato collegato correttamento all\'alimentazione e se il cavo d\'alimentazione sia funzionante. 
            Se così non fosse o se il cavo risulta non funzionante, rimendiare andando a ricollegare l\'apparecchio e\o sostituendo il cavo con un ricambio omologo.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>17,
            'malfunzionamentoID'=>8,
            'descrizione'=>'Una volta accertato che l\'alimentazione della macchina funziona corretttamente, controllare se sul cestello o sui suoi giunti vi sono presenti sedimenti di calcare.
            Se così fosse, provvedete a rimuoverli (in loco se possibile) e verificate se l\'apparecchio abblia ricomnicato a funzionare a regime.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>18,
            'malfunzionamentoID'=>8,
            'descrizione'=>'Controllate che l\'oblo si chiuda correttamente. Se notate che la serratura di questo non scatti a dovere, provvedete a sostituirla con una omologa',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>19,
            'malfunzionamentoID'=>8,
            'descrizione'=>'Portate l\'apparecchio in sede per controllare la funzionalità del motore elettrico. 
            Se questo risulta difettoso, sostituirlo con uno certificato dalla casa produttrice.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>20,
            'malfunzionamentoID'=>9,
            'descrizione'=>'Innanzitutto controllare il contatore della luce, la carica supportata e gli apparecchi elettrici in funzione.
            Se arrivate alla conclusione che il carico elettrico dell\'asciugatrice porta la casa a superare il limite, date istruzione al cliente su comenovviare a questo problema.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>21,
            'malfunzionamentoID'=>9,
            'descrizione'=>'Controllate che l\'apparecchio non scarichi a terra. Se così fosse il problema và a trovarsi sulla circuiteria.
            L\'apparecchio dovrà essere smontato e la parte danneggiata sostituita.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>22,
            'malfunzionamentoID'=>10,
            'descrizione'=>'Controllate che l\'apparecchio non scarichi a terra. Se così fosse il problema và a trovarsi sulla circuiteria.
            L\'apparecchio dovrà essere smontato e la parte danneggiata sostituita.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>23,
            'malfunzionamentoID'=>11,
            'descrizione'=>'Controlla il tubo di scarico: 
            Rimuovi il tubo dal sifone e controlla che non sia ostruito, prova a far scaricare la macchina in un secchio.
            Se il problema persiste l’ostruzione è all’interno della lavatrice e perciò dovrà essere disassemblata per eliminare il blocco.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        DB::table('soluzioni')->insert([
            'ID'=>24,
            'malfunzionamentoID'=>3,
            'descrizione'=>'Se il display elettronico non è funzionante o difettoso, il problema può risiedere nella scheda elettronica interna.
            Portare la lavatrice in sede per poter svolgere la diagnostica ed eventualmente sostituirla con una scheda omologa.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>25,
            'malfunzionamentoID'=>12,
            'descrizione'=>'Controllare che non vi siano oggetti ce possano andare ad impattare contro l\'elica di lavaggio in rotazione. Rimuovere ogni oggetto estraneo presente.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>26,
            'malfunzionamentoID'=>12,
            'descrizione'=>'Controllare ed eventualmente sostituire i cuscinetti di rotazione interni alla elica di lavaggio. Utilizzare ricambio certificato dalla casa produttrice.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>28,
            'malfunzionamentoID'=>13,
            'descrizione'=>'Controllare ed eventualmente sostituire le guarnizioni dello sportello.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>29,
            'malfunzionamentoID'=>13,
            'descrizione'=>'Controllare ed eventualmente pulire i filtri di lavaggio presenti sul fondo della macchina',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>27,
            'malfunzionamentoID'=>13,
            'descrizione'=>'Se la causa della perdita non è trovata oppure si trova in un punto inaccessibile, portare l\'elettrodomenstico in un centro assistenza per una più accurata analisi.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>32,
            'malfunzionamentoID'=>14,
            'descrizione'=>'Se la causa della perdita non è trovata oppure si trova in un punto inaccessibile, portare l\'elettrodomenstico in un centro assistenza per una più accurata analisi.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>31,
            'malfunzionamentoID'=>14,
            'descrizione'=>'Controllare ed eventualmente sostituire le guarnizioni dello sportello.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>30,
            'malfunzionamentoID'=>14,
            'descrizione'=>'Controllare ed eventualmente pulire i filtri di lavaggio presenti sul fondo della macchina',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>33,
            'malfunzionamentoID'=>15,
            'descrizione'=>'La causa può essere data da un problema con il rilascio del detergente. Controllare che la vaschetta funzioni e non sia danneggiata',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>34,
            'malfunzionamentoID'=>15,
            'descrizione'=>'La causa può essere data da una insufficiente pressione dell\'acqua. Verificare che la pressione dell\'acqua sia nei parametri descritti dal produttore ed eventualmente sostituire i pezzi necessari.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>35,
            'malfunzionamentoID'=>16,
            'descrizione'=>'Premere il pulsante di reset (se non presente, ESC e MENU insieme) per 2 secondi.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>36,
            'malfunzionamentoID'=>16,
            'descrizione'=>'Eseguire una diagnostica tramite APP fornitavi dala casa produttrice e, in caso di errore software, compiere un hard reset o reinstallare il sistema embedded.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>37,
            'malfunzionamentoID'=>16,
            'descrizione'=>'Eseguire una diagnostica tramite APP fornitavi dala casa produttrice e, in caso di errore hardware, portare l\'elettrodomestico in centro assistenza per poter sostituire le parti malfunzionanti.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>38,
            'malfunzionamentoID'=>17,
            'descrizione'=>'Se la temperatura è di molto più bassa di quella impostata, provare a riavviare il sistema ed aspettare un paio d\'ore.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>39,
            'malfunzionamentoID'=>17,
            'descrizione'=>'Se la temperatura è di molto più alta di quella impostata, provare ad impostare una temperatura più bassa. Se raggiunge la nuova temperatura, reimpostare la temperatura desiderata.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>40,
            'malfunzionamentoID'=>17,
            'descrizione'=>'Se il problema persiste, avviare una diagnostica software per individuare il problema, eventualmente riportando l\'elettrodomestico in un centro assistenza per sostitire le parti malfunzionanti',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>41,
            'malfunzionamentoID'=>18,
            'descrizione'=>'Premere il pulsante di reset (se non presente, ESC e MENU insieme) per 2 secondi.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>42,
            'malfunzionamentoID'=>18,
            'descrizione'=>'Eseguire una diagnostica tramite APP fornitavi dala casa produttrice e, in caso di errore software, compiere un hard reset o reinstallare il sistema embedded.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>43,
            'malfunzionamentoID'=>18,
            'descrizione'=>'Eseguire una diagnostica tramite APP fornitavi dala casa produttrice e, in caso di errore hardware, portare l\'elettrodomestico in centro assistenza per poter sostituire le parti malfunzionanti.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>44,
            'malfunzionamentoID'=>19,
            'descrizione'=>'Pulire il convogliatore dell\' acqua di sbrinamento ed il tubo di scarico da eventuali ostruzioni',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>45,
            'malfunzionamentoID'=>20,
            'descrizione'=>'La tensione di esercizio risulta difettosa. Portare (se possibile) il piano cottura in un centro di assistenza per poter individuare e sostituire gli elementi difettosi.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>46,
            'malfunzionamentoID'=>21,
            'descrizione'=>'Tenere premuto il bottone del sensore temperatura per 8-10 secondi, o finchè il sensore non si sia riacceso.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>47,
            'malfunzionamentoID'=>21,
            'descrizione'=>'Sostituire la batteria del sensore con un\'altra batteria omologata 3V',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>48,
            'malfunzionamentoID'=>22,
            'descrizione'=>'Il serbatoio dell\'acqua non è innestato. Inserire correttamente il serbatoio dell\'acqua in modo tale che si innesti nel supporto.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>49,
            'malfunzionamentoID'=>22,
            'descrizione'=>'l serbatoio dell\'acqua è caduto. Per la caduta si sono staccati dei componenti all\'interno del serbatoio dell\'acqua. Il serbatoio dell’acqua non è ermetico. Installare un nuovo serbatoio.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>50,
            'malfunzionamentoID'=>22,
            'descrizione'=>'Il sensore è difettoso. Controllare che questo funzioni tramite diagnostica ed eventualmente sostituire l\'elemento danneggiato',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>51,
            'malfunzionamentoID'=>23,
            'descrizione'=>'La modalità demo è attivata nelle impostazioni di base, sul display compare D01. Staccare brevemente l\'apparecchio dalla corrente disattivando il fusibile all\'interno della scatola e riaccendendolo. Disattivare la modalità demo entro 3 minuti nel menu ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>52,
            'malfunzionamentoID'=>23,
            'descrizione'=>'Se il problema si è verificato dopo un\'interruzione di corrente, aprire e richiudere lo sportello. Se non funziona, eseguire diagnostica per individuare elemento danneggiato.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
