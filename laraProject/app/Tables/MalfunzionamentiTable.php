<?php 

namespace App\Tables;

use \Okipa\LaravelTable\Table;
use App\Models\Resources\Malfunzionamento;

class MalfunzionamentiTable extends AdminTable{

    public function __construct(){
        parent::__construct();
        $this->build();
    }

    protected function build(){

        $this->model(Malfunzionamenti::class)->routes([
            'index'   => ['name' => 'malfunzionamenti.table'],
            'create'  => ['name' => 'malfunzionamento.new'],
            'edit'    => ['name' => 'malfunzionamento.modify'],
            'destroy' => ['name' => 'malfunzionamento.delete'],
            'bulk-destroy' => ['name' => 'malfunzionamenti.bulk-delete']
        ])->title('Gestione Malfunzionamenti')
        ->rowsSelection(function(Malfunzionamenti $malfunzionamento){
            return Gate::allows('editMalfunzionamenti', $malfunzionamento->prodottoID);
        })
        ->disableRows
        ->destroyConfirmationHtmlAttributes(function (Malfunzionamenti $malfunzionamento) {
            return [
                'data-confirm' => 'Sei sicuro di voler eliminare il malfunzionamento con ID ' . $malfunzionamento->ID . '?',
            ];
        })->rowsSelection();

        $this->column('ID')->title('ID')->sortable();
        $this->column('descrizione')->title('Descrizione')->searchable()->sortable();
        $this->column('prodottoID')->title('Associato a')->searchable()->sortable();
        $this->column('created_at')->title('Data creazione')->dateTimeFormat('d/m/Y H:i')->sortable();
        $this->column('updated_at')->title('Ultima modifica')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}