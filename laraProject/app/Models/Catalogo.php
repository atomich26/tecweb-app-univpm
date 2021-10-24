<?php

namespace App\Models;

use App\Models\Resources\Categoria;
use App\Models\Resources\Prodotto;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    const WILDCARD_PATTERN = '/^.[^*]+\*?$/';
    
    public function getProdotti($keyword = null){
        if($keyword == null || empty($keyword))
            return Prodotto::orderBy('nome', 'asc')->paginate(6)->fragment('results');
        
        if(strpos($keyword, '*') != false)
            $searchPattern = preg_quote(str_replace('*', '', $keyword));
        else
            $searchPattern = '[[:<:]]' . preg_quote($keyword) . '[[:>:]]';

        $prodotti = Prodotto::whereRaw('descrizione REGEXP ' . '"' .$searchPattern . '"')->paginate(6)
            ->appends(['keyword' => $keyword])
            ->fragment('results');
        
        return $prodotti;
    }

    public function getProdottiByCat($catID){
        $categoria =  Categoria::findOrFail($catID);
        $prodotti = $categoria->hasMany(Prodotto::class, 'categoriaID', 'ID')->paginate(6)->fragment('results')
            ->appends(['categoria' => $categoria->ID]);

        return ['categoria' => $categoria->nome ,'prodotti' => $prodotti];
    }

    public function getProdotto($prodottoID){
        return Prodotto::findOrFail($prodottoID);
    }
}