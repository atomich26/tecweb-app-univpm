<?php 

namespace App\Tables;

use Illuminate\Http\Request;
use \Okipa\LaravelTable\Table;

abstract class AdminTable extends Table{

    public function __construct(){
        parent::__construct();
    }

    abstract protected function build();

    protected function parseHtmlContent($text, $limit){
        if(is_null($text) || strlen($text) == 0)
            return;
        
        $parsedText = strip_tags($text); 

        if(strlen($parsedText) > $limit)
            $parsedText = substr($parsedText, 0, $limit) . '...';

        return $parsedText;
    }
}