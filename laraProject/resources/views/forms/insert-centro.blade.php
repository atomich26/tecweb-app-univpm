{{ Form::open(array('route'=>'admin.centro.store', 'id'=>'insertCenter')) }}
    <div class="input-group">
        <div class="input-inline">
            {{ Form::label('ragione_sociale','Ragione sociale*') }}
            {{ Form::text('ragione_sociale','', ['max-length' => config('strings.centro_assistenza.ragione_sociale'), 'required']) }}
            @if($errors->first('ragione_sociale'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('ragione_sociale') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif  
        </div>

        <div class="input-inline">
            {{ Form::label('email', 'E-Mail*') }}
            {{ Form::email('email','', ['max-length' => config('strings.global.default'), 'required']) }}
            @if ($errors->first('email'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="input-group">
        <div class="input-inline">
            {{Form::label('telefono', 'Recapito telefonico*')}}
            {{Form::text('telefono','', ['max-length' => config('strings.global.telefono'), 'required'])}}
            @if ($errors->first('telefono'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('telefono') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>


        <div class="input-inline">
            {{ Form::label('sito_web', 'URL sito web*') }}
            {{ Form::text('sito_web','', ['max-length' => config('strings.global.sito_web'), 'required']) }}
            @if ($errors->first('sito_web'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('sito_web') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="input-group">
        <div class="input-inline">
            {{Form::label('via', 'Via*')}}
            {{Form::text('via','', ['max-length' => config('strings.centro_assistenza.via'), 'required'])}}
            @if ($errors->first('via'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('via') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    
        <div class="input-inline">
            {{Form::label('città', 'Città*')}}
            {{Form::text('città','', ['max-length' => config('strings.centro_assistenza.città'), 'required'])}}
            @if ($errors->first('città'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('città') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    
        <div class="input-inline">
            {{Form::label('cap','CAP*')}}
            {{Form::text('cap','', ['max-length' => config('strings.centro_assistenza.cap'), 'required'])}}
            @if($errors->first('cap'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('cap') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="input-group single">
        {{ Form::label('descizione','Descrizione azienda') }}
        {{ Form::textarea('descrizione','', ['max-length' => config('strings.global.descrizione'), 'placeholder' => 'Inserisci il testo qui...']) }}
        @if ($errors->first('descrizione'))
            <ul class="input-errors-list">
                @foreach ($errors->get('descrizione') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    {{Form::submit('Inserisci', ['class' => 'button btn-form']) }}
    {{Form::reset('Annulla modifiche', ['class' => 'button btn-form']) }}
{{Form::close()}}