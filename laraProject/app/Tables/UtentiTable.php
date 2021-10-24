<?php 

namespace App\Tables;

use App\User;
use \Illuminate\View\View;
use \Okipa\LaravelTable\Table;
use App\Models\Resources\CentroAssistenza;

class UtentiTable extends AdminTable{

    public function __construct(){
        parent::__construct();
        $this->build();
    }

    protected function build(){

        $this->model(User::class)->routes([
            'index'   => ['name' => 'admin.utenti.table'],
            'create'  => ['name' => 'admin.utente.new'],
            'edit'    => ['name' => 'admin.utente.modify'],
            'destroy' => ['name' => 'admin.utente.delete'],
            'bulk-destroy' => ['name' => 'admin.utenti.bulk-delete']
        ])
        ->title('Gestione utenti')
        ->setIcon('utenti')
        ->theadTemplate('utenti-table.thead')
        ->destroyConfirmationHtmlAttributes(function (User $utente) {
            return [
                'data-confirm' => 'Sei sicuro di voler eliminare l\'utente ' . $utente->nome . " " . $utente->cognome . '?',
            ];
        })->rowsSelection(function (User $utente){
            return $utente->checkRole(['staff', 'tecnico']);
        })
        ->disableRows(function(User $utente){
            return $utente->checkRole('admin');
        },['row-disabled']);

        //Imposta le colonne della tabella
        $this->column('ID')->title('ID')->sortable();
        $this->column()->title('Avatar')->html(function(User $utente){
            return view('helpers.user-profile-image', ['image' => $utente->file_img, 'class' => 'thumb-table-user'])->render();
        });
        $this->column('nome')->title('Nome')->sortable()->searchable();
        $this->column('cognome')->title('Cognome')->sortable()->searchable();
        $this->column('username')->title('Nome utente')->sortable()->searchable();
        $this->column('data_nascita')->title('Data di nascita')->dateTimeFormat('d/m/Y')->sortable();
        $this->column('email')->title('email')->html(function(User $utente){
            return link_to('mailto:' . $utente->email, $utente->email, ['class' => 'link-col']);
        });
        $this->column('role')->title('Ruolo')->searchable();
        $this->column('centroID')->title('Centro assistenza')->value(function(User $utente){
             $centro = $utente->belongsTo(CentroAssistenza::class, 'centroID', 'ID')->first();
            if(!is_null($centro))
                return  link_to('centro-assistenza.view', $centro->ragione_sociale, ['class' => 'link-col']);
            else
                return "Nessun centro";
        });
        $this->column('last_login')->title('Ultimo accesso')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}