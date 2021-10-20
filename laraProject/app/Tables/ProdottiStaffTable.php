<?php 

namespace App\Tables;

use App\User;
use \Illuminate\View\View;
use Illuminate\Http\Request;
use \Okipa\LaravelTable\Table;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Categoria;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Database\Eloquent\Builder;

class ProdottiStaffTable extends AdminTable{

    public function __construct(Request $request){
        parent::__construct();  
        $this->build();
    }

    protected function build(){
        $this->model(Prodotto::class)->routes([
            'index'   => ['name' => 'staff-prodotti.table'],
            'show'    => ['name' => 'prodotto.view'],
            'edit'    => ['name' => 'prodotto.modify'],
        ])
        ->title('Gestione prodotti')
        ->setIcon('prodotti')
        ->query(function(Builder $query) {
            $tableName = with(new Prodotto)->getTable();
            $query->select('*');
            $query->whereRaw("(`${tableName}`.`utenteID` = " . Auth::user()->ID . " OR `${tableName}`.`utenteID` IS NULL)" );
        });

        $this->column('ID')->title('ID')->sortable();
        $this->column()->title('Immagine')->html(function(Prodotto $prodotto){
            return view('helpers.product-image', ['image' => $prodotto->file_img, 'class' => 'thumb-table'])->render();
        });
        $this->column('nome')->title('Nome')->sortable()->searchable();
        $this->column('categoriaID')->title('Categoria')->sortable()
            ->value(function(Prodotto $prodotto){
                return $prodotto->belongsTo(Categoria::class, 'categoriaID', 'ID')->first()->nome;
        });
        $this->column('modello')->title('Modello')->searchable();
        $this->column('descrizione')->title('Descrizione')->searchable()
            ->value(function(Prodotto $prodotto){
                return $this->parseHtmlContent($prodotto->descrizione, 150);
            });
        $this->column('updated_at')->title('Ultima modifica')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}