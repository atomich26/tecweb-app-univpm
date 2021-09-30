<?php 

namespace App\Tables;

use App\Models\Resources\Faq;
use \Okipa\LaravelTable\Table;

class FaqTable extends AdminTable{

    public function __construct(){
        parent::__construct();
        $this->build();
    }

    protected function build(){

        $this->model(Faq::class)->routes([
            'index'   => ['name' => 'faq.table'],
            'create'  => ['name' => 'faq.new'],
            'edit'    => ['name' => 'faq.modify'],
            'destroy' => ['name' => 'faq.delete'],
            'bulk-destroy' => ['name' => 'faq.bulk-delete']
        ])->title('Gestione faq')
        ->destroyConfirmationHtmlAttributes(function (Faq $faq) {
            return [
                'data-confirm' => 'Sei sicuro di voler eliminare la faq con ID ' . $faq->ID . '?',
            ];
        })->rowsSelection();

        $this->column('ID')->title('ID')->sortable();
        $this->column('domanda')->title('Domanda')->searchable()->value(function(Faq $faq){
           return $this->parseHtmlContent($faq->domanda, 190);
        });
        $this->column('risposta')->title('Risposta')->searchable()->value(function(Faq $faq){
            return $this->parseHtmlContent($faq->risposta, 190);
        });
        $this->column('updated_at')->title('Ultima modifica')->dateTimeFormat('d/m/Y H:i')->sortable();
    }
}