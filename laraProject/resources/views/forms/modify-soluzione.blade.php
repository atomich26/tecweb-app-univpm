{{ Form::open(array('route' => [Auth::user()->role . '.soluzione.update', $prodottoID, $malfunzionamento->ID, $soluzione->ID], 'id' =>'modify-malfunzionamento', 'method'=>'POST')) }}
    
    {{ Form::hidden('_method', 'PUT')}}
    
    <div class="descrizione-malf">
        <h4>Descrizione malfunzionamento:</h4>
        <p>{{ $malfunzionamento->descrizione }} </p>
    </div>
    <div class="input-group single">
        {{ Form::label('descrizione', 'Descrizione soluzione*') }}
        {{ Form::textarea('descrizione', $soluzione->descrizione, ['max-length' => config('strings.soluzione.descrizione'), 'placeholder' => 'Inserisci il testo qui...', 'required']) }}
        @if($errors->first('descrizione'))
        <ul>
            @foreach ($errors->get('descrizione') as $message)
                <li class="errors">{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    {{ Form::submit('Inserisci', ['class' => 'button btn-form'])}}
    {{ Form::reset('Annulla modifiche', ['class' => 'button btn-form'])}}
    
{{ Form::close()}}
