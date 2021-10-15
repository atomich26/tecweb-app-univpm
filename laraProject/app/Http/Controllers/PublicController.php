<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogo;
use App\Models\Resources\Faq;
use App\Models\Resources\Prodotto;
use App\Http\Requests\GetProductRequest;

class PublicController extends Controller
{

    public function viewCatalogo(Request $request){
        $prodottoID = $request->query('prodotto');
        $categoriaID = $request->query('categoria');

        $catalogo = new Catalogo();

        if(!empty($categoriaID))
            return view('public.catalogo')->with('prodotti', $catalogo->getProdottiByCat($categoriaID)->paginate(10));
        elseif(!empty($prodottoID))
            return view('public.prodotto')->with('prodotto', $catalogo->getProdotto($prodottoID));
        else
            return view('public.catalogo')->with('prodotti', $catalogo->getProdotti()->paginate(10));
            
    }

    public function searchCatalogo(Request $request){
        $catalogo = new Catalogo();
        
        if(empty($keyword)){
            $prodotti = $catalogo->getProdotti()->paginate(10);
            return;
        }

        if(strpos($keyword, '*') != false)
            $searchPattern = '[[:<:]]' . str_replace('*', '', $keyword);
        else
            $searchPattern = '[[:<:]]' . $keyword . '[[:>:]]';

        $prodotti = $catalogo->getProdotti()->whereRaw('descrizione REGEXP ' . '\'' .$searchPattern . '\'')->paginate(10);
        
        return view('public.catalogo')->with('prodotti', $prodotti);
    }

    public function viewCentriAssistenzaPage(){
        return view('public.centri-assistenza');
    }

    public function viewFaqPage(){
        $faqs = FAQ::paginate(6);
        return view('public.faq')->with('faqs', $faqs);
    }
}
