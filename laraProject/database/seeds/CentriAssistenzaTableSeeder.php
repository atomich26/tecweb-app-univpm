<?php

use Illuminate\Database\Seeder;

class CentriAssistenzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('centri_assistenza')->insert([
            'ID' => 1,
            'ragione_sociale' => 'C&C',
            'telefono' => '0880101010',
            'email' => 'supporto@cec.it',
            'sito_web' => 'https://www.cecspa.it',
            'descrizione' => 'Electrohm a Venezia è C&C! Nato nel 2018, il nuovo Headquarter è una struttura green e sostenibile, alimentata da un impianto fotovoltaico che produce maggiore energia rispetto al fabbisogno, 
             e che gode di un impianto di geotermia. Ospita la base operativa del gruppo C&C e il Centro Assistenza Autorizzato Electrohm. 
             Passione, qualità e servizi. E un sorriso, sempre.',
            'via' => 'Via Boccaccio 43',
            'città' => 'Venezia',
            'cap' => '30100',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('centri_assistenza')->insert([
            'ID' => 2,
            'ragione_sociale' => 'Compulab',
            'telefono' => '0918110112',
            'email' => 'contatti@compulab.it',
            'sito_web' => 'https://www.compulab.it',
            'descrizione' => 'Compulab, rivenditore Electrohm a Bari, da sempre nel campo degli elettrodomestici, 
             è divenuto nel tempo punto di riferimento per la Puglia, Basilicata e Calabria.
             Da oltre venticinque anni sul mercato, ha maturato importanti competenze, grazie anche alla preparazione e l’esperienza delle proprie figure professionali,
             in grado di fornire un supporto tecnologico essenziale per ogni esigenza e a qualunque livello.',
            'via' => 'Viale Como 14',
            'città' => 'Bari',
            'cap' => '70121',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('centri_assistenza')->insert([
            'ID' => 3,
            'ragione_sociale' => 'Avatech',
            'telefono' => '0792110113',
            'email' => 'supporto.tecnico@avatech.it',
            'sito_web' => 'https://www.avatech.com',
            'descrizione' => 'Il gruppo AvaTech, rivenditore e centro assistenza autorizzato Electrohm, ha uno standard elevato su tutti i processi aziendali in modo da poter soddisfare pienamente le richieste dei clienti
             e con un livello di precisione e professionalità altissimo. Siamo riusciti a mantenere il livello talmente alto da riuscire ad affermarci pienamente sul mercato italiano 
             e sul mercato europeo in molte nazioni. L’importo dell’assistenza è il più basso che potrete mai trovare sul mercato, in quanto abbiamo trascorso anni ed anni nello studio e 
             nella riparazione delle schede logiche e non dobbiamo appoggiarci a strutture esterne.
             Le riparazioni spesso vengono effettuate anche in tempi da record, perché il nostro personale è stato istruito dal direttore del laboratorio che è considerato uno dei maggiori esperti 
             a livello internazionale.',
            'via' => 'Corso Garibaldi 49',
            'città' => 'Roma',
            'cap' => '00127',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('centri_assistenza')->insert([
            'ID' => 4,
            'ragione_sociale' => 'R-store',
            'telefono' => '0894301110',
            'email' => 'contattaci@r-store.it',
            'sito_web' => 'https://www.r-store.it',
            'descrizione' => "Il nostro team di tecnici qualificato Electrohm Professional, con differenti professionalità, diventa interlocutore unico per soddisfare le vostre esigenze in ambito riparazioni 
            di elettrodomestici. Proponiamo diverse soluzioni per l'assistenza presso il nostro laboratorio e on-site presso la sede del Cliente. Inoltre per essere sempre più rapidi nel rispondere alle richieste dei Clienti, 
            abbiamo attivato un servizio di assistenza remota. Per usufruire del servizio sarà sufficiente disporre di un collegamento ad Internet e seguire poche e semplici procedure",
            'via' => 'Piazza della Repubblica 3a',
            'città' => 'Modena',
            'cap' => '41100',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('centri_assistenza')->insert([
            'ID' => 5,
            'ragione_sociale' => 'Axios Repair',
            'telefono' => '0893456710',
            'email' => 'support@axiosrepair.com',
            'sito_web' => 'https://www.axiosrepair.com',
            'descrizione' => "Axios Repair nasce a Messina nel 1996 ha sede e negozio in Via Matteotti 98c(sotto i portici con possibilita’ di sosta).        
             Oltre alla rivendita di prodotti offriamo servizi di consulenza e assistenza hardware di elettrodomestici Electrohm, autorizzati con Electrohm Professional.
             Il servizio che offriamo, muovendo dalle esigenze particolari del cliente, può essere sinteticamente descritto come segue: assistenza nella scelta del prodotto, 
             installazione degli elettrodomestici , nonchè manutenzione dei sistemi esistenti presso il cliente e supporto nell’ottimizzazione degli stessi.",
            'via' => 'Via Matteotti 98c',
            'città' => 'Messina',
            'cap' => '98121',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('centri_assistenza')->insert([
            'ID' => 6,
            'ragione_sociale' => 'Techpro',
            'telefono' => '0453400990',
            'email' => 'info@techpro.it',
            'sito_web' => 'https://www.techpro.it',
            'descrizione' => 'Techpro offre assistenza autorizzata Electrohm: tecnici certificati, ricambi originali, 
             consulenza hardware e massima attenzione alle esigenze del cliente. Il nostro centro assistenza offre un servizio con personale certificato pronto
             a risolvere qualsiasi problema di natura software e hardware. Il nostro centro assistenza ha ricevuto il riconoscimento Electrohm Premium Service Provider
             per aver fornito un servizio di eccellente qualità ed elevati livelli di soddisfazione ai loro clienti.',
            'via' => 'Viale Bastioni 32',
            'città' => 'Bologna',
            'cap' => '40126',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
