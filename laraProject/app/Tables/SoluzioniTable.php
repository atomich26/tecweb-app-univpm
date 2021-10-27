<?php 

namespace App\Tables;

use \Okipa\LaravelTable\Table;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Soluzione;
use App\Models\Resources\Malfunzionamento;
use \Illuminate\Database\Eloquent\Builder;
use \Illuminate\Support\Facades\Auth;

class SoluzioniTable extends AdminTable{

    protected $malfunzionamento;

    public function __construct($malfunzionamentoID){
        parent::__construct();
        $this->malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
        $this->build();
    }

    protected function build(){
        $prodottoID = $this->malfunzionamento->prodottoID;

        $this->model(Soluzione::class)->routes([
            'index'   => ['name' => Auth::user()->role . '.soluzioni.table', 'params' => ['prodottoID' => $prodottoID, 'malfunzionamentoID' => $this->malfunzionamento->ID ]],
            'create'  => ['name' => Auth::user()->role . '.soluzione.new', 'params' => ['prodottoID' => $prodottoID, 'malfunzionamentoID' => $this->malfunzionamento->ID ]],
            'edit'    => ['name' => Auth::user()->role . '.soluzione.modify', 'params' => ['prodottoID' => $prodottoID, 'malfunzionamentoID' => $this->malfunzionamento->ID ]],
            'destroy' => ['name' => Auth::user()->role . '.soluzione.delete', 'params' => ['prodottoID' => $prodottoID, 'malfunzionamentoID' => $this->malfunzionamento->ID ]],
            'bulk-destroy' => ['name' => Auth::user()->role . '.soluzioni.bulk-delete', 'params' => ['prodottoID' => $prodottoID, 'malfunzionamentoID' => $this->malfunzionamento->ID ]],
            'show-parent' => ['name' => Auth::user()->role . '.malfunzionamenti.table', 'params' => ['prodottoID' => $prodottoID]]
        ])
        ->title('Gestione soluzioni')
        ->setIcon('soluzioni')
        ->destroyConfirmationHtmlAttributes(function (Soluzione $soluzione) {
            return [
                'data-confirm' => 'Sei sicuro di voler eliminare la soluzione ' . $soluzione->ID . '?',
            ];
        })
        ->rowsSelection()
        ->query(function(Builder $query){
            $tableName = with(new Soluzione)->getTable();
            $query->select('*');
            $query->whereRaw("(`${tableName}`.`malfunzionamentoID` = " . $this->malfunzionamento->ID . ")");
        });

        $this->column('ID')->title('ID')->sortable();
        $this->column('descrizione')->title('Descrizione')->searchable()->sortable();
        $this->column('created_at')->title('Data creazione')->dateTimeFormat('d/m/Y H:i')->sortable();
        $this->column('updated_at')->title('Ultima modifica')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}