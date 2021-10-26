<?php 

namespace App\Tables;

use App\User;
use \Okipa\LaravelTable\Table;
use App\Models\Resources\CentroAssistenza;

class CentriAssistenzaTable extends AdminTable{

    public function __construct(){
        parent::__construct();
        $this->build();
    }

    protected function build(){

        $this->model(CentroAssistenza::class)->routes([
            'index'   => ['name' => 'admin.centri.table'],
            'create'  => ['name' => 'admin.centro.new'],
            'edit'    => ['name' => 'admin.centro.modify'],
            'destroy' => ['name' => 'admin.centro.delete'],
            'bulk-destroy' => ['name' => 'admin.centri.bulk-delete']
        ])->title('Gestione centri assistenza')
        ->setIcon('centri-assistenza')
        ->destroyConfirmationHtmlAttributes(function (CentroAssistenza $centro) {
            return [
                'data-confirm' => "Sei sicuro di voler eliminare il centro assistenza $centro->ragione_sociale ?",
            ];
        })->rowsSelection();

        $this->column('ID')->title('ID')->sortable();
        $this->column('ragione_sociale')->title('Ragione sociale')->searchable()->sortable();
        $this->column('telefono')->title('Telefono')->searchable()->html(function(CentroAssistenza $centro){
            return link_to('tel:' . $centro->telefono, $title = $centro->telefono, $attributes = ['class' => 'link-col']);
        });
        $this->column('email')->title('E-mail')->searchable()->html(function(CentroAssistenza $centro){
            return link_to('mailto:' . $centro->email, $title = $centro->email, $attributes = ['class' => 'link-col']);
        });
        $this->column('sito_web')->title('Sito web')->html(function(CentroAssistenza $centro){
            return link_to($centro->sito_web, $centro->sito_web,['class' => 'link-col']);
        });
        $this->column('via')->title('Via');
        $this->column('città')->title('Città')->searchable()->sortable();
        $this->column()->title('Tecnici')->value(function(CentroAssistenza $centro){
            $tecnici = count($centro->hasMany(User::class, 'centroID', 'ID')->get());      
            $tecnici = ($tecnici < 1) ? "Nessun tecnico" : $tecnici;

            return $tecnici;
        });
        $this->column('updated_at')->title('Ultima modifica')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}