<?php 

namespace App\Tables;

use App\User;
use \Illuminate\View\View;
use \Okipa\LaravelTable\Table;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Categoria;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Database\Eloquent\Builder;

class ProdottiTable extends AdminTable{

    public function __construct(){
        parent::__construct();
        $this->build();
    }

    protected function build(){
        $routes = array(
            'index'=> ['name' => Auth::user()->role . ".prodotti.table"],
            'show' => ['name' => 'prodotto.view'],
            'edit' => ['name' => Auth::user()->role . ".prodotto.modify"]);

        if(Auth::user()->checkRole('admin')){
            $adminRoutes = array(
                'create' => ['name' => 'admin.prodotto.new'],
                'destroy' => ['name' => 'admin.prodotto.delete'],
                'bulk-destroy' => ['name' => 'admin.prodotti.bulk-delete']
            );
            
            $routes =  array_merge($routes, $adminRoutes);
        }

        $this->model(Prodotto::class)->theadTemplate('prodotti-table.thead')->routes($routes)
        ->title('Gestione prodotti')
        ->setIcon('prodotti');

        if(Auth::user()->checkRole('staff')){
            $this->query(function(Builder $query) {
                $tableName = with(new Prodotto)->getTable();
                $query->select('*');
                $query->whereRaw("(`${tableName}`.`utenteID` = " . Auth::user()->ID . " OR `${tableName}`.`utenteID` IS NULL)" );
            });
        }
            
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

        if(Auth::user()->checkRole('admin')){
            $this->rowsSelection()->destroyConfirmationHtmlAttributes(function (Prodotto $prodotto) {
                return [
                    'data-confirm' => 'Sei sicuro di voler eliminare il prodotto ' . $prodotto->nome . '?',
                ];
            });

            $this->column('utenteID')->title('Assegnato a')->value(function(Prodotto $prodotto){
                if(!is_null($prodotto->utenteID))
                    return $prodotto->belongsTo(User::class,'utenteID', 'ID')->first()->username;
                else
                    return "Tutti";
            });
        }
        
        $this->column('updated_at')->title('Ultima modifica')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}