<?php 

namespace App\Tables;

use \Okipa\LaravelTable\Table;
use App\Models\Resources\Malfunzionamento;
use App\Models\Resources\Soluzione;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MalfunzionamentiTable extends AdminTable{
    protected $prodottoID;

    public function __construct($prodottoID){
        parent::__construct();
        $this->prodottoID = $prodottoID;
        $this->build();
    }

    protected function build(){
        $this->model(Malfunzionamento::class)->routes([
            'index'   => ['name' => Auth::user()->role . '.malfunzionamenti.table', 'params' => ['prodottoID' => $this->prodottoID]],
            'create'  => ['name' => Auth::user()->role . '.malfunzionamento.new', 'params' => ['prodottoID' => $this->prodottoID]],
            'show' => ['name' => Auth::user()->role . '.soluzioni.table', 'params' => ['prodottoID' => $this->prodottoID]],
            'edit'    => ['name' => Auth::user()->role . '.malfunzionamento.modify', 'params' => ['prodottoID' => $this->prodottoID]],
            'destroy' => ['name' => Auth::user()->role . '.malfunzionamento.delete', 'params' => ['prodottoID' => $this->prodottoID]],
            'bulk-destroy' => ['name' => Auth::user()->role . '.malfunzionamenti.bulk-delete', 'params' => ['prodottoID' => $this->prodottoID]],
            'show-parent' => ['name' => Auth::user()->role . '.prodotti.table']
        ])
        ->title('Gestione Malfunzionamenti')
        ->setIcon('malfunzionamenti')
        ->destroyConfirmationHtmlAttributes(function (Malfunzionamento $malfunzionamento) {
            return [
                'data-confirm' => 'Sei sicuro di voler eliminare il malfunzionamento ' . $malfunzionamento->ID . '?',
            ];
        })
        ->rowsSelection()
        ->query(function(Builder $query){
            $tableName = with(new Malfunzionamento)->getTable();
            $query->select('*');
        $query->whereRaw("(`$tableName`.`prodottoID` = $this->prodottoID)");
        });

        $this->column('ID')->title('ID')->sortable();
        $this->column('descrizione')->title('Descrizione')->searchable()->sortable();
        $this->column()->title('Soluzioni')->value(function(Malfunzionamento $malfunzionamento){
            $soluzioni = $malfunzionamento->hasMany(Soluzione::class,'malfunzionamentoID', 'ID')->get();
            return count($soluzioni);
        });
        $this->column('created_at')->title('Data creazione')->dateTimeFormat('d/m/Y H:i')->sortable();
        $this->column('updated_at')->title('Ultima modifica')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}