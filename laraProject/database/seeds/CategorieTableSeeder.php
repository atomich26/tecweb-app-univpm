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
        ]);

        DB::table('categorie')->insert([
            'ID' => 2,
            'nome' => 'Lavastoviglie',
        ]);

        DB::table('categorie')->insert([
            'ID' => 3,
            'nome' => 'Frigoriferi e congelatori',
        ]);

        DB::table('categorie')->insert([
            'ID' => 4,
            'nome' => 'Piani cottura e forni',
        ]);
    }
}
