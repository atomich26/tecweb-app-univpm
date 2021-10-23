<?php 

namespace App\Tables;

use \Okipa\LaravelTable\Table;
use App\Models\Resources\Malfunzionamento;
use \Illuminate\Database\Eloquent\Builder;

class SoluzioniTable extends AdminTable{

    protected $malfunzionamentoID;

    public function __construct($malfunzionamentoID){
        parent::__construct();
        $this->build();
        $this->malfunzionamentoID = $malfunzionamentoID;
    }

    protected function build(){
        $this->model(Soluzioni::class)->routes([
            'index'   => ['name' => Auth::user()->role . 'soluzioni.table'],
            'create'  => ['name' => Auth::user()->role . 'soluzioni.new'],
            'edit'    => ['name' => Auth::user()->role . 'soluzioni.modify'],
            'destroy' => ['name' => Auth::user()->role . 'soluzioni.delete'],
            'bulk-destroy' => ['name' => Auth::user()->role . 'soluzioni.bulk-delete']
        ])
        ->title('Gestione Malfunzionamenti')
        ->setIcon('malfunzionamenti')
        ->destroyConfirmationHtmlAttributes(function (Malfunzionamenti $malfunzionamento) {
            return [
                'data-confirm' => 'Sei sicuro di voler eliminare il malfunzionamento ' . $malfunzionamento->ID . '?',
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