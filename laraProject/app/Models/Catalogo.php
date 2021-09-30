<?php

namespace App\Models;

use App\Models\Resources\Categoria;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    const WILDCARD_PATTERN = '/^.[^*]+\*?$/';

    public function __construct(){
        
    }

    public function searchProdotti($keyword){
        $preg_result = preg_match(WILDCARD_PATTERN, $keyword);//non serve

        if(!$preg_result){
            return;
        }

        if(strpos($keyword, '*') != false)
            $searchPattern = '[[:<:]]' . str_replace('*', '', $keyword);
        else
            $searchPattern = '[[:<:]]' . $keyword . '[[:>:]]';

        $prodotti = Prodotti::whereRaw('descrizione REGEXP ' . '\'' .$searchPattern . '\'')->get();

        return $prodotti;
    }

    public function getProductsByCat($catID){
        $categoria =  Categoria::findOrFail($catID);

        return $categoria->hasMany(Prodotto::class, 'categoriaID', 'ID')->get();
    }

    public function getAllCategories(){
        return Categoria::all()->get();
    }
}
