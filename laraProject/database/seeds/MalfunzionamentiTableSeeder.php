<?php

use Illuminate\Database\Seeder;

class MalfunzionamentiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('malfunzionamenti')->insert([
            'ID'=>1,
            'prodottoID'=>1,
            'descrizione'=>'La lavatrice non scarica acqua a fine lavaggio.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>2,
            'prodottoID'=>1,
            'descrizione'=>'Lo sportello non si apre.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>3,
            'prodottoID'=>1,
            'descrizione'=>'Il timer non funziona correttamente.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>4,
            'prodottoID'=>2,
            'descrizione'=>'La lavatrice non scarica acqua a fine lavaggio.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>5,
            'prodottoID'=>2,
            'descrizione'=>'La centrifuga non parte.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>6,
            'prodottoID'=>3,
            'descrizione'=>'La lavatrice perde acqua.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>7,
            'prodottoID'=>4,
            'descrizione'=>'L\'asciugatrice fà saltare la luce.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>8,
            'prodottoID'=>4,
            'descrizione'=>'Il cestello non gira.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>9,
            'prodottoID'=>5,
            'descrizione'=>'L\'asciugatrice fà saltare il salvavita.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>10,
            'prodottoID'=>5,
            'descrizione'=>'Il cestello non gira.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>11,
            'prodottoID'=>5,
            'descrizione'=>'L\'asciugatrice perde acqua.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>12,
            'prodottoID'=>6,
            'descrizione'=>'La lavastoviglie fà un forte rumore in funzione'
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>13,
            'prodottoID'=>6,
            'descrizione'=>'La lavastoviglie perde acqua'
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>14,
            'prodottoID'=>7,
            'descrizione'=>'La lavastoviglie perde acqua'
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>15,
            'prodottoID'=>7,
            'descrizione'=>'La lavastoviglie non pulisce bene i piatti'
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>16,
            'prodottoID'=>8,
            'descrizione'=>'L’apparecchio non raffredda, le spie di temperatura e l’illuminazione sono accese.'
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>17,
            'prodottoID'=>8,
            'descrizione'=>'La temperatura si discosta notevolmente dalle impostazioni iniziali.'
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>18,
            'prodottoID'=>9,
            'descrizione'=>'La temperatura si discosta notevolmente dalle impostazioni iniziali.'
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>19,
            'prodottoID'=>9,
            'descrizione'=>'Il fondo del vano frigorifero rimane bagnato'
        ]);
       
        DB::table('malfunzionamenti')->insert([
            'ID'=>20,
            'prodottoID'=>10,
            'descrizione'=>'Display produce errore E9000'
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>21,
            'prodottoID'=>10,
            'descrizione'=>'Il sensore di temperatura non funziona'
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>22,
            'prodottoID'=>11,
            'descrizione'=>'Sul display compare "Riempire il serbatoio dell\'acqua", nonostante il serbatoio sia pieno.'
        ]);

        DB::table('malfunzionamenti')->insert([
            'ID'=>23,
            'prodottoID'=>11,
            'descrizione'=>'L\'apparecchio non scalda.'
        ]);
    }
}
