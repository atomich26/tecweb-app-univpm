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
            'nome'=> 'ELECTROHM Congelatore Beta Arctic',
            'modello'=> 'ELB4552',
            'categoriaID'=> 3,
            'descrizione'=> 'Descrizione Descrizione 1 2 3',
            'specifiche'=> 'Specifiche Specifiche 1 2 3',
            'guida_installazione'=> 'Guida Guida 1 2 3',
            'note_uso'=> 'Note Note 1 2 3',
            'utenteID'=> null,
        ]);

        DB::table('prodotti')->insert([
            'ID'=> 2,
            'nome'=> 'ELECTROHM Asciugatrice Stratos Integrale ++',
            'modello'=> 'ELS0845',
            'categoriaID'=> 1,
            'descrizione'=> 'Descrizione Descrizione 1 2 3',
            'specifiche'=> 'Specifiche Specifiche 1 2 3',
            'guida_installazione'=> 'Guida Guida 1 2 3',
            'note_uso'=> 'Note Note 1 2 3',
            'utenteID'=> null,
        ]);

        DB::table('prodotti')->insert([
            'ID'=>3,
            'nome'=> 'ELECTROHM Lavatrice Thema Extended',
            'modello'=> 'ELH9202',
            'categoriaID'=> 1,
            'descrizione'=> 'Descrizione Descrizione 1 2 3',
            'specifiche'=> 'Specifiche Specifiche 1 2 3',
            'guida_installazione'=> 'Guida Guida 1 2 3',
            'note_uso'=> 'Note Note 1 2 3',
            'utenteID'=> null,
        ]);

        DB::table('prodotti')->insert([
            'ID'=>4,
            'nome'=> 'ELECTROHM Lavartrice Thema Compact',
            'modello'=> 'ELH2004',
            'categoriaID'=> 1,
            'descrizione'=> 'Descrizione Descrizione 1 2 3',
            'specifiche'=> 'Specifiche Specifiche 1 2 3',
            'guida_installazione'=> 'Guida Guida 1 2 3',
            'note_uso'=> 'Note Note 1 2 3',
            'utenteID'=> null,
        ]);

        DB::table('prodotti')->insert([
            'ID'=>5,
            'nome'=> 'ELECTROHM Forno Ardea 12 Livelli Master',
            'modello'=> 'ELA9412',
            'categoriaID'=> 4,
            'descrizione'=> 'Descrizione Descrizione 1 2 3',
            'specifiche'=> 'Specifiche Specifiche 1 2 3',
            'guida_installazione'=> 'Guida Guida 1 2 3',
            'note_uso'=> 'Note Note 1 2 3',
            'utenteID'=> null,
        ]);

        DB::table('prodotti')->insert([
            'ID'=>6,
            'nome'=> 'ELECTROHM Piano Cottura Thesis Elettrico',
            'modello'=> 'ELT8826',
            'categoriaID'=> 4,
            'descrizione'=> 'Descrizione Descrizione 1 2 3',
            'specifiche'=> 'Specifiche Specifiche 1 2 3',
            'guida_installazione'=> 'Guida Guida 1 2 3',
            'note_uso'=> 'Note Note 1 2 3',
            'utenteID'=> null,
        ]);

        DB::table('prodotti')->insert([
            'ID'=>7,
            'nome'=> 'ELECTROHM Lavastoviglie Lybra Triplo Carico',
            'modello'=> 'ELL3396',
            'categoriaID'=> 2,
            'descrizione'=> 'Descrizione Descrizione 1 2 3',
            'specifiche'=> 'Specifiche Specifiche 1 2 3',
            'guida_installazione'=> 'Guida Guida 1 2 3',
            'note_uso'=> 'Note Note 1 2 3',
            'utenteID'=> null,
        ]);
        
        DB::table('prodotti')->insert([
            'ID'=>8,
            'nome'=> 'ELECTROHM Frigorifero Prisma Deluxe',
            'modello'=> 'ELD0997',
            'categoriaID'=> 3 ,
            'descrizione'=> 'Descrizione Descrizione 1 2 3',
            'specifiche'=> 'Specifiche Specifiche 1 2 3',
            'guida_installazione'=> 'Guida Guida 1 2 3',
            'note_uso'=> 'Note Note 1 2 3',
            'utenteID'=> null,
        ]);
        
    }
    
}
