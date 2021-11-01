{{ Form::open(array('route' => ['admin.faq.store'], 'id' =>'insertFaq', 'Method'=>'POST')) }}
    <div class="input-group single">
        {{ Form::label('domanda', 'Domanda*') }}
        {{ Form::textarea('domanda', '', ['max-length' => config('strings.faq.domanda'), 'placeholder' => 'Inserisci qui la domanda...', 'required']) }}
        @if($errors->first('domanda'))
            <ul class="input-errors-list">
                @foreach ($errors->get('domanda') as $message)
                    <li class="errors">{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="input-group single">
        {{ Form::label('risposta',  'Risposta*') }}
        {{ Form::textarea('risposta','', ['max-length' => config('strings.faq.risposta'), 'placeholder' => 'Inserisci qui la risposta...', 'required']) }}
        @if($errors->first('risposta'))
            <ul class="input-errors-list">
                @foreach ($errors->get('risposta') as $message)
                    <li class="errors">{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    {{ Form::submit ('Inserisci faq', ['class' => 'button btn-form']) }}
    {{ Form::reset ('Annulla modifiche', ['class' => 'button btn-form'])}}
{{Form::close()}}