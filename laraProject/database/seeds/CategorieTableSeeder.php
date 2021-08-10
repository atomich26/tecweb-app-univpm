<?php

use Illuminate\Database\Seeder;
use App\Models\Enums;   

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Categories::CATEGORIES as $catID => $categoryName) {
           DB::table('categorie')->insert([
               'ID' => $catID,
               'nome' => $categoryName
           ]);
        }
    }
}
