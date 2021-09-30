<?php 

namespace App\Tables;

use \Okipa\LaravelTable\Table;
use App\Models\Resources\CentroAssistenza;

class CentriAssistenzaTable extends AdminTable{

    public function __construct(){
        parent::__construct();
        $this->build();
    }

    protected function build(){

        $this->model(CentroAssistenza::class)->routes([
            'index'   => ['name' => 'centri.table'],
            'create'  => ['name' => 'centro.new'],
            'edit'    => ['name' => 'centro.modify'],
            'destroy' => ['name' => 'centro.delete'],
            'bulk-destroy' => ['name' => 'centri.bulk-delete']
        ])->title('Gestione Centri Assistenza')
        ->destroyConfirmationHtmlAttributes(function (CentroAssistenza $centro) {
            return [
                'data-confirm' => 'Sei sicuro di voler eliminare il centro assistenza' . $centro->ragione_sociale . '?',
            ];
        })->rowsSelection();

        $this->column('ID')->title('ID')->sortable();
        $this->column('ragione_sociale')->title('Ragione sociale')->searchable()->sortable();
        $this->column('telefono')->title('Telefono')->searchable();
        $this->column('email')->title('E-mail')->searchable();
        $this->column('sito_web')->title('Sito web');
        $this->column('via')->title('Via');
        $this->column('città')->title('Città')->searchable()->sortable();
        $this->column('updated_at')->title('Ultima modifica')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}