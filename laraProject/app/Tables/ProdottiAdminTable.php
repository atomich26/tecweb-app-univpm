<?php 

namespace App\Tables;

use App\User;
use \Illuminate\View\View;
use \Okipa\LaravelTable\Table;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Categoria;

class ProdottiAdminTable extends AdminTable{

    public function __construct(){
        parent::__construct();
        $this->build();
    }

    protected function build(){

        $this->model(Prodotto::class)->theadTemplate('prodotti-table.thead')->routes([
            'index'   => ['name' => 'prodotti.table'],
            'create'  => ['name' => 'prodotto.new'],
            'show'    => ['name' => 'prodotto.view'],
            'edit'    => ['name' => 'prodotto.modify'],
            'destroy' => ['name' => 'prodotto.delete'],
            'bulk-destroy' => ['name' => 'prodotti.bulk-delete']
        ])
        ->title('Gestione prodotti')
        ->setIcon('prodotti')
        ->destroyConfirmationHtmlAttributes(function (Prodotto $prodotto) {
            return [
                'data-confirm' => 'Sei sicuro di voler eliminare il prodotto ' . $prodotto->nome . '?',
            ];
        })
        ->rowsSelection();
        $this->column('ID')->title('ID')->sortable();
        $this->column()->title('Immagine')->html(function(Prodotto $prodotto){
            return view('helpers.product-image', ['image' => $prodotto->file_img, 'class' => 'thumb-table'])->render();
        });
        $this->column('nome')->title('Nome')->sortable()->searchable();
        $this->column('categoriaID')->title('Categoria')->sortable()
            ->value(function(Prodotto $prodotto){
                return $prodotto->belongsTo(Categoria::class, 'categoriaID', 'ID')->first()->nome;
        });
        $this->column('modello')->title('Modello')->searchable();
        $this->column('descrizione')->title('Descrizione')->searchable()
            ->value(function(Prodotto $prodotto){
                return $this->parseHtmlContent($prodotto->descrizione, 150);
            });
        $this->column('utenteID')->title('Assegnato a')->value(function(Prodotto $prodotto){
            if(!is_null($prodotto->utenteID))
                return $prodotto->belongsTo(User::class,'utenteID', 'ID')->first()->username;
            else
                return "Tutti";
        });
        $this->column('updated_at')->title('Ultima modifica')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}