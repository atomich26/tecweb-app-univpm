<div id="form-modify-faq" class="form-admin-data" >
{{  Form::open(array('route' => [Auth::user()->role . '.soluzione.update', $prodottoID, $malfunzionamento->ID, $soluzione->ID], 'id' =>'modify-malfunzionamento', 'method'=>'POST')) }}
<br>
<h2>Modifica soluzione {{ $soluzione->ID }}</h2>
<br>
<h3>{{ $malfunzionamento->descrizione }}</h3>

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
{{  Form::hidden('_method', 'PUT')}}
{{  Form::submit('Inserisci Soluzione')}}
<br>
{{ Form::reset ('Annulla modifiche') }}
<br>
{{  Form::close()}}
</div>