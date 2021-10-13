<?php

use Illuminate\Database\Seeder;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorie')->insert([
            'ID' => 1,
            'nome' => 'Lavatrici e asciugatrici',
            'descrizione' => 'Le nostre tecnologie innovative per la cura dei tessuti aiutano a proteggere i vestiti che ami; che tu stia lavando il tuo maglione di lana preferito o i tuoi capi di seta più delicati, Electrohm ha una lavatrice su misura per il tuo guardaroba. Con le lavatrici Electrohm PerfectCare, laverai in modo sostenibile per il pianeta e i tuoi vestiti dureranno più a lungo nel tempo.',
            'file_img' => 'lavatrici_e_asciugatrici.jpg'
        ]);

        DB::table('categorie')->insert([
            'ID' => 2,
            'nome' => 'Lavastoviglie',
            'descrizione' => 'Scopri le migliori lavastoviglie a libera installazione della nostra gamma. Dalla serie 700, per quella brillantezza in più, fino alla serie 300 per un\'asciugatura dei piatti sempre perfetta, abbiamo una soluzione a tutte le tue esigenze.',
            'file_img' => 'lavastoviglie.jpg'
        ]);

        DB::table('categorie')->insert([
            'ID' => 3,
            'nome' => 'Frigoriferi e congelatori',
            'descrizione' => 'I nostri frigocongelatori a libera installazione si adattano alla tua cucina e al tuo modo di cucinare. Per te, una soluzione che si adatta sia alla tua vita quotidiana e alla tua cucina.',
            'file_img' => 'frigoriferi_e_congelatori.jpg'
        ]);

        DB::table('categorie')->insert([
            'ID' => 4,
            'nome' => 'Piani cottura e forni',
            'descrizione' => 'I nostri forni e piani cottura offrono tutto il necessario per creare piatti speciali e ricchi di sapori. Assapora la carne tenera, che si stacca dall\'osso, grazie alle funzioni di cottura a vapore, che permettono di lasciare la carne morbida e succulenta, concentrando i sapori.',
            'file_img' => 'piani_cottura_e_forni.jpg'
        ]);
    }
}
