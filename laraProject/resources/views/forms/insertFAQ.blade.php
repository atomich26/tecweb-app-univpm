<div class="form-blank">
    {{ Form::open(array('route' => 'faq.store', 'id' =>'insertFaq')) }}

    <h2>Aggiungi una nuova FAQ</h2>
        <div class="wrap-input">
            {{  Form::label('domanda', 'Domanda')}}
            {{  Form::textarea('domanda', old('domanda'), ['id' => 'domanda-text-area', 'placeholder' => 'Inserisci qui la domanda']) }}
            <h4 id="domanda-counter" class="text-counter"><span id="current-length">0</span>/<span id="max-counter">{{ Config::get('strings.faq.domanda') }}</span></h4>
            @if ($errors->first('domanda'))
                <ul>
                    @foreach ($errors->get('domanda') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="wrap-input">
        {{  Form::label('risposta',  'Risposta')}}
        {{  Form::textarea('risposta', old('risposta'), ['placeholder' => 'Inserisci qui la risposta']) }}
        <h4 id="domanda-counter"class="text-counter">0/{{ Config::get('strings.faq.domanda') }}</h4>
        @if ($errors->first('risposta'))
                <ul>
                    @foreach ($errors->get('risposta') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
        </div>

    <div>
    {{  Form::submit ('Conferma')}}
    </div>

    <div>
    {{  Form::reset ('Azzera')}}
    </div>

{{Form::close()}}
</div>
