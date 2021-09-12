<div id="form-modify-faq" class="form-admin-data" >

    {{ Form::open(array('route' => ['faq.update', $faq->ID], 'id' =>'modify-Faq', 'Method'=>'POST')) }}

    <h2>Modifica FAQ con {{ $faq->ID }}</h2>
        <div class="wrap-input">
            {{  Form::label('domanda', 'Domanda')}}
            {{  Form::textarea('domanda', $faq->domanda, ['class' => 'input-data with-counter', 'max-length' => Config::get('strings.faq.domanda'), 'placeholder' => 'Inserisci qui la domanda']) }}
            <h4 data-name="counter-domanda" class="textarea-counter"><span class="current-length">0</span>/{{ Config::get('strings.faq.domanda') }}</h4>

            @if ($errors->first('domanda'))
                <ul>
                    @foreach ($errors->get('domanda') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="wrap-input textarea-with-counter">
            {{  Form::label('risposta',  'Risposta')}}
            {{  Form::textarea('risposta', $faq->risposta, ['class' => 'input-data with-counter','max-length' => Config::get('strings.faq.risposta'), 'placeholder' => 'Inserisci qui la risposta']) }}
            <h4 data-name="counter-risposta" class="textarea-counter"><span class="current-length">0</span>/{{ Config::get('strings.faq.risposta') }}</h4>

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
        {{  Form::reset ('Azzera')}}
        {{  Form::hidden ('_method', 'PUT')}}
    </div>
    {{Form::close()}}
</div>
