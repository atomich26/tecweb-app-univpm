<div id="form-modify-faq" class="form-admin-data" >
{{  Form::open(array('route' => [Auth::user()->role '.insertSoluzione.store', $product->ID, $malfunzionamento->ID], 'id' =>'insert-malfunzionamento', 'Method'=>'POST')) }}
<br>
<h2>Inserisci Soluzione Malfunzionamento</h2>
<br>
{{  Form::textarea('descrizioneMalfunzione',$malfunzionamento->descrizione, ['readonly'])}}
<br>
{{  Form::label('descrizione', 'Descrivi Soluzione')}}
<br>
{{  Form::textarea('descrizione','')}}
    @if($errors->first('descrizione'))
    <ul>
         @foreach ($errors->get('descrizione') as $message)
             <li class="errors">{{ $message }}</li>
         @endforeach
    </ul>
    @endif
<br>
<br>
{{  Form::submit('Inserisci Soluzione')}}
<br>
{{  Form::close()}}
</div>