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
            'ID'=>01,
            'domanda'=>'Posso acquistare pezzi di ricambio da questo sito?',
            'risposta'=>'Questo portale è adibito alla sola consultazione della documentazione neccessaria alla risoluzione dei guasti. Vendita di pezzi di ricambio ai privati non è al momento concessa.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('faqs')->insert([
            'ID'=>02,
            'domanda'=>'Dove posso acquistare i prodotti qui presenti',
            'risposta'=>'I prodotti possono essere acquistati nelle nostre sedi principali o nei negozi specializzati stanziati in tutta Italia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('faqs')->insert([
            'ID'=>03,
            'domanda'=>'Non trovo un malfunzionamento/soluzione al malfunzionamento nella documentazione fornita. Cosa posso fare?',
            'risposta'=>'Contatti il nostro centro. Un nostro la contatterà al più presto per concordare una visita ed un eventuale ritiro',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
 