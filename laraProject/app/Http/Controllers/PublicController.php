<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogo;
use App\Models\Resources\Faq;
use App\Models\Resources\CentroAssistenza;
use App\Models\Resources\Prodotto;
use app\models\resources\Malfunzionamento;
use app\models\resources\Soluzione;
use App\Http\Requests\GetProductRequest;

class PublicController extends Controller
{   
    protected $catalogo;
    const ILLEGAL_CHAR = '/\$|\%|\^|\&|\(|\)|\+|\=|\-|\[|\]|\'|\;|\,|\.|\/|\{|\}|\||\:|\<|\>|\?|\~/m';

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
        $keyword = rtrim($request->keyword);

        if($keyword == null || empty($keyword))
            return redirect()->route('catalogo.view');
        else if(preg_match(self::ILLEGAL_CHAR, $keyword))
            return response()->actionResponse('catalogo.view','error', "Il pattern di ricerca non può contenere i caratteri: $ % ^ & ( ) + = - [ ] ' ; , . / { } | : < > ? ~");

        $prodottiSearched = $this->catalogo->getProdotti($keyword);
        
        if($prodottiSearched->total() < 1)
            return response()->actionResponse('catalogo.view', 'warning', "La ricerca per <b>${keyword}</b> non ha prodotto risultati");

        return view('public.catalogo', ['prodotti' => $prodottiSearched, 'keyword' => $keyword]);
    }

    public function viewCentriAssistenzaPage(Request $request){
        $selected = $request->query('place');
        
        if($selected == null || empty($selected))
            $centri = CentroAssistenza::orderBy('ragione_sociale', 'asc')->paginate(6);
        else
            $centri = CentroAssistenza::where('città', $selected)->paginate(6)->appends(['place' => $selected ]);
            
        $città = CentroAssistenza::groupBy('città')->distinct()->pluck('città','città');

        return view('public.centri-assistenza', ['centri' => $centri, 'città' => $città, 'selected' => $selected]);
    }

    public function viewFaqPage(){
        $faqs = FAQ::paginate(6);

        return view('public.faq')->with('faqs', $faqs);
    }
}
