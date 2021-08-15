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
            'nome'=> 'SESLoaded',
            'modello'=> 'SES0033',
            'categoriaID'=> 3,
            'descrizione'=> 'Descrizione Descrizione 1 2 3',
            'specifiche'=> 'Specifiche Specifiche 1 2 3',
            'guida_installazione'=> 'Guida Guida 1 2 3',
            'note_uso'=> 'Note Note 1 2 3',
            'utenteID'=> null,
        ]);

        DB::table('prodotti')->insert([
            'ID'=> 2,
            'nome'=> 'Vladof',
            'modello'=> 'VDF0251',
            'categoriaID'=> 1,
            'descrizione'=> 'Descrizione Descrizione 1 2 3',
            'specifiche'=> 'Specifiche Specifiche 1 2 3',
            'guida_installazione'=> 'Guida Guida 1 2 3',
            'note_uso'=> 'Note Note 1 2 3',
            'utenteID'=> null,
        ]);

        DB::table('prodotti')->insert([
            'ID'=>3,
            'nome'=> 'Maliwan',
            'modello'=> 'MWN0020',
            'categoriaID'=> 3,
            'descrizione'=> 'Descrizione Descrizione 1 2 3',
            'specifiche'=> 'Specifiche Specifiche 1 2 3',
            'guida_installazione'=> 'Guida Guida 1 2 3',
            'note_uso'=> 'Note Note 1 2 3',
            'utenteID'=> null,
        ]);

      
    }
}
