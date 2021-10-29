
{{ Form::open(array('route' => [Auth::user()->role . '.malfunzionamento.store', $prodottoID], 'id' =>'insert-malfunzionamento', 'Method'=>'POST')) }}
    <div class="input-group single">
        {{ Form::label('descrizione','Descrizione malfunzionamento*') }}
        {{ Form::textarea('descrizione','', ['max-length' => config('strings.malfunzionamento.descrizione'), 'placeholder' => 'Inserisci il testo qui...', 'required']) }}
        @if ($errors->first('descrizione'))
            <ul class="input-errors-list">
                @foreach ($errors->get('descrizione') as $message)
                    <li class="errors">{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    {{ Form::submit('Inserisci', ['class' => 'button btn-form']) }}
    {{ Form::reset('Annulla modifiche', ['class' => 'button btn-form']) }}
{{ Form::close() }}