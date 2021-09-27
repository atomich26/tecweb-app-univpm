<?php 

namespace App\Tables;

use \Illuminate\View\View;
use App\User;
use App\Models\Resources\CentroAssistenza;
use \Okipa\LaravelTable\Table;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UtentiTable{

    protected $table;

    public function __construct(){
        $this->table = $this->buildTable();
    }

    public function view(){
        return $this->table;
    }

    protected function buildTable(){

        //Inizializza l'oggetto Table ed effettua le configurazioni
        $table = (new Table)->model(User::class)->routes([
            'index'   => ['name' => 'utenti.table'],
            'create'  => ['name' => 'utente.new'],
            'edit'    => ['name' => 'utente.modify'],
            'destroy' => ['name' => 'utente.delete'],
        ])
        ->title('Gestione utenti')
        ->destroyConfirmationHtmlAttributes(function (User $utente) {
            return [
                'data-confirm' => 'Sei sicuro di voler eliminare l\'utente ' . $utente->nome . " " . $utente->cognome . '?',
            ];
        })->disableRows(function(User $utente){
            return $utente->role == 'admin';
        },['row-disabled']);

        //Imposta le colonne della tabella
        $table->column()->title('Seleziona')->html(function(User $utente){
            if($utente->role != 'admin')
                return "<input class=\"selector\" type=\"checkbox\" value=\"" . $utente->ID . "\">";
        })->classes(['align-middle', 'select-box', 'text-center']);
        $table->column('ID')->title('ID')->sortable();
        $table->column()->title('Avatar')->html(function(User $utente){
            return view('helpers.user-profile-image', ['image' => $utente->file_img, 'class' => 'thumb-table-user'])->render();
        });
        $table->column('nome')->title('Nome')->sortable()->searchable();
        $table->column('cognome')->title('Cognome')->sortable()->searchable();
        $table->column('username')->title('Nome utente')->sortable()->searchable();
        $table->column('data_nascita')->title('Data di nascita')->dateTimeFormat('d/m/Y')->sortable();
        $table->column('email')->title('email');
        $table->column('role')->title('Ruolo')->searchable();
        $table->column('centroID')->title('Centro assistenza')->searchable()->value(function(User $utente){
             $centro = $utente->belongsTo(CentroAssistenza::class, 'centroID', 'ID')->first();
            if(!is_null($centro))
                return  $centro->ragione_sociale;
            else
                return "Nessun centro";
        });
        $table->column('last_login')->title('Ultimo accesso')->dateTimeFormat('d/m/Y H:i')->sortable();
        
        return $table;
    }
}