{{  Form::open(array('route'=>[Auth::user()->role . '.prodotto.update', $prodotto->ID], 'id'=>'modify-prodotto', 'files'=>'true', 'Method'=>'POST'))}}
    
    {{ Form::hidden ('_method', 'PUT') }}

    <div class="input-group">
        <div class="input-inline">
            {{ Form::label('nome', 'Nome del prodotto*') }}
            {{ Form::text('nome', $prodotto->nome, ['max-length' => config('strings.prodotto.nome'), 'required'])}}
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
            {{ Form::text('modello', $prodotto->modello, ['max-length' => config('strings.prodotto.modello'), 'required']) }}
            @if ($errors->first('modello'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('modello') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="input-group single" style="width: 50%">
        {{ Form::label('file_img','Immagine Prodotto') }}
        <div class="preview-img-container">
            @php
                $hasImage = !($prodotto->file_img == null || rtrim($prodotto->file_img) == ''); 
            @endphp
            <img id="item-image" src="{{ $hasImage ? asset('/storage/images/products/' . $prodotto->file_img) : '' }}" alt="item-image">
            <button class="button delete-preview" type="button" id="delete-preview" style="display:none"
                @if($hasImage)
                    data-url="{{ route(Auth::user()->role . '.prodotto.delete-img', ['prodottoID' => $prodotto->ID])}}"
                @endif
            >{!! config('laravel-table.icon.destroy') !!} Rimuovi immagine</button>
        </div>
        {{ Form::file('file_img', ["accept" => 'image/*', 'id' => 'load-image']) }}
        @if ($errors->first('file_img'))
            <ul class="input-errors-list">
                @foreach ($errors->get('file_img') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="input-group">
        <div class="input-inline">
            {{ Form::label('categoriaID','Categoria Prodotto') }}
            {{ Form::select('categoriaID', Categoria::pluck('nome', 'ID'), $prodotto->categoriaID ) }}
        </div>
        @can('isAdmin')
            <div class="input-inline">
                {{ Form::label('utenteID','Assegna ad un membro') }}
                {{ form::select('utenteID',$staffUtenti, $prodotto->utenteID,['placeholder'=>'Non assegnato']) }}
            </div>
        @endcan
    </div>

    <div class="input-group single">
        {{ Form::label('descrizione','Descrizione*') }}
        {{ Form::textarea('descrizione',$prodotto->descrizione, ['max-length' => config('strings.prodotto.descrizione'), 'required', 'placeholder' => 'Inserisci il testo qui...']) }}
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
            <i class="bi bi-info-circle"></i>
        </div>
        {{ Form::textarea('specifiche', $prodotto->specifiche, ['max-length' => config('strings.prodotto.specifiche'), 'required', 'placeholder' => 'Inserisci il testo qui...']) }}
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
            <i class="bi bi-info-circle"></i>
        </div>
        {{Form::textarea('guida_installazione', $prodotto->guida_installazione, ['max-length' => config('strings.prodotto.guida_installazione'), 'placeholder' => 'Inserisci il testo qui...']) }}
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
            <i class="bi bi-info-circle"></i>
        </div>
        {{ Form::textarea('note_uso', $prodotto->note_uso, ['max-length' => config('strings.prodotto.note_uso'), 'placeholder' => 'Inserisci il testo qui...']) }}
        @if ($errors->first('note_uso'))
            <ul class="input-errors-list">
                @foreach ($errors->get('note_uso') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    {{ Form::submit ('Aggiorna prodotto', ['class' => 'button btn-form']) }}
    {{ Form::reset('Annulla modifiche', ['class' => 'button btn-form']) }}
{{Form::close()}}



