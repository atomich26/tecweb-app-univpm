<?php 

namespace App\Tables;

use \Okipa\LaravelTable\Table;
use App\Models\Resources\Malfunzionamento;
use \Illuminate\Database\Eloquent\Builder;

class MalfunzionamentiTable extends AdminTable{

    protected $prodottoID;

    public function __construct($prodottoID){
        parent::__construct();
        $this->build();
        $this->prodottoID = $prodottoID;
    }

    protected function build(){

        $this->model(Malfunzionamenti::class)->routes([
            'index'   => ['name' => 'malfunzionamenti.table'],
            'create'  => ['name' => 'malfunzionamento.new'],
            'edit'    => ['name' => 'malfunzionamento.modify'],
            'destroy' => ['name' => 'malfunzionamento.delete'],
            'bulk-destroy' => ['name' => 'malfunzionamenti.bulk-delete']
        ])->title('Gestione Malfunzionamenti')
        ->setIcon('malfunzionamenti')
        ->rowsSelection(function(Malfunzionamenti $malfunzionamento){
            return Gate::allows('editMalfunzionamenti', $malfunzionamento->prodottoID);
        })
        ->destroyConfirmationHtmlAttributes(function (Malfunzionamenti $malfunzionamento) {
            return [
                'data-confirm' => 'Sei sicuro di voler eliminare il malfunzionamento con ID ' . $malfunzionamento->ID . '?',
            ];
        })
        ->rowsSelection()
        ->query(function(Builder $query){
            $tableName = with(new Malfunzionamento)->getTable();
            $query->select('*');
            $query->whereRaw("(`${tableName}`.`prodottoID` = ${$this->prodottoID}");
        });

        $this->column('ID')->title('ID')->sortable();
        $this->column('descrizione')->title('Descrizione')->searchable()->sortable();
        $this->column('prodottoID')->title('Associato a')->searchable()->sortable();
        $this->column('created_at')->title('Data creazione')->dateTimeFormat('d/m/Y H:i')->sortable();
        $this->column('updated_at')->title('Ultima modifica')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}