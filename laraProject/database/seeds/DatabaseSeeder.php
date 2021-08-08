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
            FaqsTableSeeder::class,
            CentriAssistenzaTableSeeder::class,
            UtentiTableSeeder::class,
            ProdottiTableSeeder::class,
            MalfunzionamentiTableSeeder::class,
            SoluzioniTableSeeder::class,
        ]);
    }
}
