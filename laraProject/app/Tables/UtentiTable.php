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
            'index'   => ['name' => 'utenti.table'],
            'create'  => ['name' => 'utente.new'],
            'edit'    => ['name' => 'utente.modify'],
            'destroy' => ['name' => 'utente.delete'],
            'bulk-destroy' => ['name' => 'utenti.bulk-delete']
        ])
        ->title('Gestione utenti')
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
        $this->column('email')->title('email');
        $this->column('role')->title('Ruolo')->searchable();
        $this->column('centroID')->title('Centro assistenza')->value(function(User $utente){
             $centro = $utente->belongsTo(CentroAssistenza::class, 'centroID', 'ID')->first();
            if(!is_null($centro))
                return  $centro->ragione_sociale;
            else
                return "Nessun centro";
        });
        $this->column('last_login')->title('Ultimo accesso')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}