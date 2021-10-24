<div id="form-insert-faq" class="form-admin-data" >

    {{ Form::open(array('route' => ['admin.faq.store'], 'id' =>'insertFaq', 'Method'=>'POST')) }}

    <h2>{{ $title }}</h2>
        <div class="wrap-input .ckeditor">
            {{  Form::label('domanda', 'Domanda')}}
            {{  Form::textarea('domanda', old('domanda'), ['class' => 'input-data with-counter', 'max-length' => Config::get('strings.faq.domanda'), 'placeholder' => 'Inserisci qui la domanda']) }}
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
            {{  Form::textarea('risposta', old('risposta'), ['class' => 'input-data with-counter','max-length' => Config::get('strings.faq.risposta'), 'placeholder' => 'Inserisci qui la risposta']) }}
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
        {{  Form::submit ('Salva', ['formaction' => route('admin.faq.store', ['action' => 'close'])]) }}
        {{  Form::reset ('Azzera')}}
    </div>
    {{Form::close()}}
</div>
