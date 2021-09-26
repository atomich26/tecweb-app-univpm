<?php 

namespace App\Tables;

use \Illuminate\View\View;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Categoria;
use \Okipa\LaravelTable\Table;
use \App\User;

class ProdottiTable{

    public function index(){

        $table = (new Table)->model(Prodotto::class)->routes([
            'index'   => ['name' => 'prodotti.table'],
            'create'  => ['name' => 'prodotto.new'],
            'edit'    => ['name' => 'prodotto.modify'],
            'destroy' => ['name' => 'prodotto.delete'],
        ])->destroyConfirmationHtmlAttributes(function (Prodotto $prodotto) {
            return [
                'data-confirm' => 'Sei sicuro di voler eliminare il prodotto ' . $prodotto->nome . '?',
            ];
        });
        $table->column('ID')->title('ID')->sortable();
        $table->column('nome')->title('Nome')->sortable()->searchable();
        /*$table->column('categoriaID')->title('Categoria')->sortable()
            ->searchable()
            ->value(function(Prodotto $prodotto){
                return $prodotto->belongsTo(Categoria::class, 'categoriaID', 'ID')->first()->nome();
        });*/
        $table->column('modello')->title('Modello')->searchable();
        $table->column('descrizione')->title('Descrizione')->searchable();
        $table->column('file_img')->title('Immagine')->searchable();
        return $table;
    }
}