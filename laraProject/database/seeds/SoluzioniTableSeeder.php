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
            Se il problema persiste l’ostruzione è all’interno della lavatrice e perciò dovrà essere disassemblata per eliminare il blocco.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>2,
            'malfunzionamentoID'=>1,
            'descrizione'=>'Un altro motivo può per il blocco può essere il filtro.
            Svita il filtro e assicurati che non ci siano oggetti estranei all’interno. Inclina la lavatrice e usa un catino per rimuovere l’acqua.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>3,
            'malfunzionamentoID'=>2,
            'descrizione'=>'Controllare se la serratura dello sportello mostra difetti o danni che possono portare al malfunzionamento dell\'oblò.
            Se individuate un difetto, smontatelo e sostituitelo con un pezzo di ricambio omologo.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>4,
            'malfunzionamentoID'=>2,
            'descrizione'=>'Se all\'apertura notate acqua sul fondo del cestello, il problema sarà dato dal non corretto scarico dell\'acqua.
            Controllate perciò filtro e tubo di scarico.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>5,
            'malfunzionamentoID'=>2,
            'descrizione'=>'Se il display elettronico mostra un codice d\'errore, prego fare riferimento alla guida all\'utilizzo d cui il mezzo è munito.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>6,
            'malfunzionamentoID'=>3,
            'descrizione'=>'Se il display elettronico mostra un codice d\'errore, prego fare riferimento alla guida all\'utilizzo d cui il mezzo è munito.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>7,
            'malfunzionamentoID'=>4,
            'descrizione'=>'Controlla il tubo di scarico: 
            Rimuovi il tubo dal sifone e controlla che non sia ostruito, prova a far scaricare la macchina in un secchio.
            Se il problema persiste l’ostruzione è all’interno della lavatrice e perciò dovrà essere disassemblata per eliminare il blocco.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>8,
            'malfunzionamentoID'=>4,
            'descrizione'=>'Un altro motivo può per il blocco può essere il filtro.
            Svita il filtro e assicurati che non ci siano oggetti estranei all’interno. Inclina la lavatrice e usa un catino per rimuovere l’acqua.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>9,
            'malfunzionamentoID'=>5,
            'descrizione'=>'Fare un test senza carico, se il problema non si riscontra è molto probabile che il problema sia dovuto all\'eccessivo carico.
            Controllate se l\'utente abbia rispettato i limiti di carico indicati dalla casa produttrice.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>10,
            'malfunzionamentoID'=>5,
            'descrizione'=>'Se la centrifuga non parte o se il ciclo è irregolare, il problema può essere dato da un falso contatto del cavo d\'alimentazione. 
            Fare un test su questo ed eventualmente sostituitelo. Se con nuovo cavo d\'alimentazione omologo il problema persiste, il problema sarà nel circuito d\'alimentazione interno.
            Portate la macchina in sede per poter essere disassemblata e riparata.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>11,
            'malfunzionamentoID'=>5,
            'descrizione'=>'Se la frequenza della centrifuga è più bassa di quella dichiarata dal produttore, il problema può essere dato dal calcare accumulatosi all\'interno.
            Smontate il cestello ed esaminate la macchina. Se riscontrate sedimentazioni di calcare, portate il componente in sede per poter rimuovere il tutto.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>12,
            'malfunzionamentoID'=>6,
            'descrizione'=>'Controlla il tubo di scarico: 
            Rimuovi il tubo dal sifone e controlla che non sia ostruito, prova a far scaricare la macchina in un secchio.
            Se il problema persiste l’ostruzione è all’interno della lavatrice e perciò dovrà essere disassemblata per eliminare il blocco.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>13,
            'malfunzionamentoID'=>6,
            'descrizione'=>'Un altro motivo può per il blocco può essere il filtro.
            Svita il filtro e assicurati che non ci siano oggetti estranei all’interno. Inclina la lavatrice e usa un catino per rimuovere l’acqua.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>14,
            'malfunzionamentoID'=>7,
            'descrizione'=>'Controllare il contatore della luce, la carica supportata e gli apparecchi elettrici in funzione.
            Se arrivate alla conclusione che il carico elettrico dell\'asciugatrice porta la casa a superare il limite, date istruzione al cliente su comenovviare a questo problema.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>15,
            'malfunzionamentoID'=>7,
            'descrizione'=>'Controllate che l\'apparecchio non scarichi a terra. Se così fosse il problema và a trovarsi sulla circuiteria.
            L\'apparecchio dovrà essere smontato e la parte danneggiata sostituita.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>16,
            'malfunzionamentoID'=>8,
            'descrizione'=>'Controllate se l\'apparecchio è stato collegato correttamento all\'alimentazione e se il cavo d\'alimentazione sia funzionante. 
            Se così non fosse o se il cavo risulta non funzionante, rimendiare andando a ricollegare l\'apparecchio e\o sostituendo il cavo con un ricambio omologo.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>17,
            'malfunzionamentoID'=>8,
            'descrizione'=>'Una volta accertato che l\'alimentazione della macchina funziona corretttamente, controllare se sul cestello o sui suoi giunti vi sono presenti sedimenti di calcare.
            Se così fosse, provvedete a rimuoverli (in loco se possibile) e verificate se l\'apparecchio abblia ricomnicato a funzionare a regime.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>18,
            'malfunzionamentoID'=>8,
            'descrizione'=>'Controllate che l\'oblo si chiuda correttamente. Se notate che la serratura di questo non scatti a dovere, provvedete a sostituirla con una omologa'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>19,
            'malfunzionamentoID'=>8,
            'descrizione'=>'Portate l\'apparecchio in sede per controllare la funzionalità del motore elettrico. 
            Se questo risulta difettoso, sostituirlo con uno certificato dalla casa produttrice.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>20,
            'malfunzionamentoID'=>9,
            'descrizione'=>'Innanzitutto controllare il contatore della luce, la carica supportata e gli apparecchi elettrici in funzione.
            Se arrivate alla conclusione che il carico elettrico dell\'asciugatrice porta la casa a superare il limite, date istruzione al cliente su comenovviare a questo problema.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>21,
            'malfunzionamentoID'=>9,
            'descrizione'=>'Controllate che l\'apparecchio non scarichi a terra. Se così fosse il problema và a trovarsi sulla circuiteria.
            L\'apparecchio dovrà essere smontato e la parte danneggiata sostituita.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>22,
            'malfunzionamentoID'=>10,
            'descrizione'=>'Controllate che l\'apparecchio non scarichi a terra. Se così fosse il problema và a trovarsi sulla circuiteria.
            L\'apparecchio dovrà essere smontato e la parte danneggiata sostituita.'
        ]);

        DB::table('soluzioni')->insert([
            'ID'=>23,
            'malfunzionamentoID'=>11,
            'descrizione'=>'Controlla il tubo di scarico: 
            Rimuovi il tubo dal sifone e controlla che non sia ostruito, prova a far scaricare la macchina in un secchio.
            Se il problema persiste l’ostruzione è all’interno della lavatrice e perciò dovrà essere disassemblata per eliminare il blocco.'
        ]);
        
        DB::table('soluzioni')->insert([
            'ID'=>24,
            'malfunzionamentoID'=>3,
            'descrizione'=>'Se il display elettronico non è funzionante o difettoso, il problema può risiedere nella scheda elettronica interna.
            Portare la lavatrice in sede per poter svolgere la diagnostica ed eventualmente sostituirla con una scheda omologa.'
        ]);

    }
}
