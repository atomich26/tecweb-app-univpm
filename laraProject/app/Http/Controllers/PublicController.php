<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogo;
use App\Models\Resources\Faq;
use App\Models\Resources\Prodotto;
use app\models\resources\Malfunzionamento;
use app\models\resources\Soluzione;
use App\Http\Requests\GetProductRequest;

class PublicController extends Controller
{   
    protected $catalogo;

    public function __construct(){
        $this->catalogo = new Catalogo();
    }

    public function viewCatalogo(Request $request){
        $prodottoID = $request->query('prodotto');
        $categoriaID = $request->query('categoria');

        if(!empty($categoriaID))
            return view('public.catalogo', $this->catalogo->getProdottiByCat($categoriaID));
        elseif(!empty($prodottoID))
            return view('public.prodotto', ['prodotto' => $this->catalogo->getProdotto($prodottoID)]);
        else
            return view('public.catalogo', ['prodotti' => $this->catalogo->getProdotti()]);
            
    }

    public function searchCatalogo(Request $request){
        $prodottiSearched = $this->catalogo->getProdotti($request->keyword);
        
        if($prodottiSearched->total() < 1)
            return response()->actionResponse('catalogo.view', 'warning', 'La ricerca non ha prodotto risultati');

        return view('public.catalogo', ['prodotti' => $prodottiSearched, 'keyword' => $request->keyword]);
    }

    public function viewCentriAssistenzaPage(){
        return view('public.centri-assistenza');
    }

    public function viewFaqPage(){
        $faqs = FAQ::paginate(6);

        return view('public.faq')->with('faqs', $faqs);
    }
}
