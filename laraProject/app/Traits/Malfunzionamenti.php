<?php

/**
 * Il trait Malfunzionamenti definisce le funzioni che gestiscono le CRUD 
 * per i malfunzionamenti e le soluzioni
 */
trait Malfunzionamenti
{
    public function insertMalfunzionamento($productID)
    {   
        $product = Prodotto::find($productID);
        return view ('admin.insert-malfunzionamento')->with('product', $product);
      
    }

    public function saveMalfunzionamento(MalfunzionamentoRequest $request, $productID){
        $product = Prodotto::find($productID);
        $error = new Malfunzionamento;
        $error->prodottoID = $product->ID;
        $error->descrizione = $request->descrizione;
        $error->save();

        return view('public.prodotto')->with('prodotto', $product);
    }

    public function modifyMalfunzionamento($productID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
        $product = Prodotto::find($productID);
        if(!($malfunzionamento->prodottoID == $product->ID)){
            abort(404);
        }
        else
        return view ('admin.modify-malfunzionamento')   ->with('product', $product)
                                                        ->with('malfunzionamento', $malfunzionamento);
    }

    public function updateMalfunzionamento(MalfunzionamentoRequest $request, $productID, $malfunzionamentoID){
        $error = Malfunzionamento::find($malfunzionamentoID);
        $error->descrizione = $request->descrizione;
        $productID = $error->prodottoID;
        $error->save();
        return redirect()->route('prodotto',['productID'=>$productID]);
    }

    public function deleteMalfunzionamento($malfunzionamentoID){
        $error = Malfunzionamento::find($malfunzionamentoID);
        $product = $error->prodottoID;
        $error->delete();
        return redirect()->route('prodotto',['productID'=>$productID]);
    }

    public function insertSoluzione($productID, $malfunzionamentoID){
        $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
        $product = Prodotto::find($productID);
        if(!($malfunzionamento->prodottoID == $product->ID)){
            abort(404);
        }
        else
        return view ('admin.insert-soluzione')   ->with('product', $product)
                                                        ->with('malfunzionamento', $malfunzionamento);

    }

    public function saveSoluzione(SoluzioneRequest $request, $productID, $malfunzionamentoID){
        
        $soluzione = new Soluzione;
        $soluzione->descrizione = $request->descrizione;
        $soluzione->malfunzionamentoID = $malfunzionamentoID;

        $soluzione->save();
        return redirect()->route('prodotto',['productID'=>$productID]);
    }

    public function modifySoluzione($productID, $malfunzionamentoID, $soluzioneID){
        $soluzione = Soluzione::find($soluzioneID);
        $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
        if(($malfunzionamento->prodottoID == $productID)&&($soluzione->malfunzionamentoID==$malfunzionamentoID)){
            return view('admin.modifySoluzione')
                                                  ->with('malfunzionamento',$malfunzionamento)
                                                    ->with('soluzione',$soluzione);
        }
        else abort(404);
    }

    public function updateSoluzione(SoluzioneRequest $request, $productID, $malfunzionamentoID, $soluzioneID){
        $soluzione = Soluzione::find($soluzioneID);
        $soluzione->descrizione = $request->descrizione;
        $soluzione->save();
        return redirect()->route('prodotto',['productID'=>$productID]);
    }

    public function deleteSoluzione($productID, $malfunzionamentoID, $soluzioneID){
        $soluzione = Soluzione::find($soluzioneID);
        $malfunzionamento = Malfunzionamento::find($malfunzionamentoID);
        if(($malfunzionamento->prodottoID == $productID)&&($soluzione->malfunzionamentoID==$malfunzionamentoID)){
           $soluzione->delete();
           return redirect()->route('prodotto',['productID'=>$productID]);
        }
        else abort(403);
    }
}
