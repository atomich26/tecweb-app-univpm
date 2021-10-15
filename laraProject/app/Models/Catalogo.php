<?php

namespace App\Models;

use App\Models\Resources\Categoria;
use App\Models\Resources\Prodotto;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    const WILDCARD_PATTERN = '/^.[^*]+\*?$/';
    
    public function getProdotti(){
        return Prodotto::orderBy('created_at', 'desc');
    }

    public function getProdottiByCat($catID){
        $categoria =  Categoria::findOrFail($catID);
        $this->prodotti = $categoria->hasMany(Prodotto::class, 'categoriaID', 'ID');
    }

    public function getProdotto($prodottoID){
        return Prodotto::findOrFail($prodottoID);
    }

    public function getCategorieAsMap(){
        return $this->categorieList->pluck(['ID', 'nome']);
    }
}
