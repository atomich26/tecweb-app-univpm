<div id="form-modify-faq" class="form-admin-data" >
{{  Form::open(array('route' => ['insertSoluzione.store', $malfunzionamento->ID, $soluzione->ID], 'id' =>'modify-malfunzionamento', 'Method'=>'POST')) }}
<br>
<h2>Inserisci Soluzione Malfunzionamento</h2>
<br>
{{  Form::textarea('descrizioneMalfunzione',$malfunzionamento->descrizione, ['readonly'])}}
<br>
{{  Form::label('descrizione', 'Descrivi Soluzione')}}
<br>
{{  Form::textarea('descrizione', $soluzione->descrizione)}}
    @if($errors->first('descrizione'))
    <ul>
         @foreach ($errors->get('descrizione') as $message)
             <li class="errors">{{ $message }}</li>
         @endforeach
    </ul>
    @endif
<br>
<br>
{{  Form::hidden('_method'=>'PUT')}}
{{  Form::submit('Inserisci Soluzione')}}
<br>
{{ Form::reset ('Annulla modifiche') }}
<br>
{{  Form::close()}}
</div>