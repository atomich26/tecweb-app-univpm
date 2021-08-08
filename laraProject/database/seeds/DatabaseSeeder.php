<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorieTableSeeder::class,
            FaqTableSeeder::class,
            CentriAssistenzaTableSeeder::class,
            UtentiTableSeeder::class,
            ProdottiTableSeeder::class,
            MalfunzionamentiTableSeeder::class,
            SoluzioniTableSeeder::class,
        ]);
    }
}
