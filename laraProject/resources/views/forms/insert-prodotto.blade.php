{{ Form::open(array('route'=>'admin.prodotto.store', 'id'=>'insertProdotto', 'files'=>'true')) }}
    <div class="input-group">
        <div class="input-inline">
            {{ Form::label('nome', 'Nome del prodotto*') }}
            {{ Form::text('nome', '', ['max-length' => config('strings.prodotto.nome'), 'required'])}}
            @if ($errors->first('nome'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="input-inline">
            {{ Form::label('modello', 'Codice modello*') }}
            {{ Form::text('modello','', ['max-length' => config('strings.prodotto.modello'), 'required']) }}
            @if ($errors->first('modello'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('modello') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="input-group single">
        {{ Form::label('file_img','Immagine Prodotto') }}
        {{ Form::file('file_img', ["accept" => 'image/*']) }}
        @if ($errors->first('file_img'))
            <ul class="input-errors-list">
                @foreach ($errors->get('file_img') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
        <img id="product-preview-image" src="#" width="150px" height="150px" alt="product-image">
        <button type="button" id="delete-preview-img" onclick="deletePreview()" style="display:none">Cancella immagine caricata</button>
    </div>

    <div class="input-group">
        <div class="input-inline">
            {{ Form::label('categoriaID','Categoria Prodotto') }}
            {{ Form::select('categoriaID', Categoria::pluck('nome', 'ID')) }}
        </div>
        <div class="input-inline">
            {{ Form::label('utenteID','Assegna ad un membro') }}
            {{ form::select('utenteID',$staffUtenti, null, ['placeholder'=>'Non assegnato']) }}
        </div>
    </div>

    <div class="input-group single">
        {{ Form::label('descrizione','Descrizione*') }}
        {{ Form::textarea('descrizione','', ['max-length' => config('strings.prodotto.descrizione'), 'required', 'placeholder' => 'Inserisci testo qui...']) }}
        @if($errors->first('descrizione'))
            <ul class="input-errors-list">
                @foreach ($errors->get('descrizione') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="input-group single">
        <div>
            {{ Form::label('specifiche', 'Specifiche*') }}
            <i class="bi bi-info-circle" onclick="showTextareaTip()"></i>
        </div>
        {{ Form::textarea('specifiche','', ['max-length' => config('strings.prodotto.specifiche'), 'required', 'placeholder' => 'Inserisci testo qui...']) }}
        @if($errors->first('specifiche'))
            <ul class="input-errors-list">
                @foreach ($errors->get('specifiche') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="input-group single">
        <div>
            {{ Form::label('guida_installazione', "Guida all'installazione") }}
            <i class="bi bi-info-circle" onclick="showTextareaTip()"></i>
        </div>
        {{Form::textarea('guida_installazione','', ['max-length' => config('strings.prodotto.guida_installazione'), 'placeholder' => 'Inserisci testo qui...']) }}
        @if ($errors->first('guida_installazione'))
            <ul class="input-errors-list"> 
                @foreach ($errors->get('guida_installazione') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="input-group single">
        <div>
            {{ Form::label('note_uso',"Note di buon uso") }}
            <i class="bi bi-info-circle" onclick="showTextareaTip()"></i>
        </div>
        {{ Form::textarea('note_uso','', ['max-length' => config('strings.prodotto.specifiche'), 'placeholder' => 'Inserisci testo qui...']) }}
        @if ($errors->first('note_uso'))
            <ul class="input-errors-list">
                @foreach ($errors->get('note_uso') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    {{ Form::submit ('Conferma', ['class' => 'button btn-form']) }}
    {{ Form::reset('Annulla modifiche', ['class' => 'button btn-form']) }}
{{Form::close()}}
