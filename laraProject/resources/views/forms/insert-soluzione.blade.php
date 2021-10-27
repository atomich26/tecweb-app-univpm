<div id="form-modify-faq" class="form-admin-data" >
{{  Form::open(array('route' => [Auth::user()->role . '.soluzione.store', $prodottoID, $malfunzionamento->ID], 'id' =>'insert-malfunzionamento', 'Method'=>'POST')) }}

    <h3>Descrizione malfunzionamento: {{ $malfunzionamento->descrizione }} </h3)}}
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