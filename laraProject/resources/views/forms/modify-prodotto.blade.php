@php
use App\Models\Resources\Categoria;
@endphp
{{  Form::open(array('route'=>[Auth::user()->role . '.prodotto.update', $prodotto->ID], 'id'=>'modify-prodotto', 'files'=>'true', 'Method'=>'POST'))}}

<h2>{{ $title }}</h2>

    <div class="form-input-group row-d">
        {{Form::label('nome', 'Nome del prodotto')}}
        {{Form::text('nome',$prodotto->nome)}}
        @if ($errors->first('nome'))
                <ul>
                    @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>
    <br>
    <br>
    <div>
        {{Form::label('modello', 'Codice Identifico Modello')}}
        {{Form::text('modello',$prodotto->modello)}}
        @if ($errors->first('modello'))
                <ul>
                    @foreach ($errors->get('modello') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>
    <br>
    <br>
    <div>
    {{Form::label('categoriaID','Categoria Prodotto')}}
    {{Form::select('categoriaID', Categoria::pluck('nome', 'ID'), $prodotto->categoriaID)}}

    </div>
    <br>
    <br>
    <div>
        {{Form::label('descrizione','Descrizione del Prodotto')}}
        {{Form::textarea('descrizione',$prodotto->descrizione)}}
        @if ($errors->first('descrizione'))
                <ul>
                    @foreach ($errors->get('descrizione') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>
    <br>
    <br>
    <div>
        <div style="display:block">
            {{Form::label('specifiche', 'Specifiche del Prodotto')}}
            <i class="bi bi-info-circle" onclick="showTextareaTip()"></i>
        <div>
        {{Form::textarea('specifiche',$prodotto->specifiche)}}
        @if ($errors->first('specifiche'))
                <ul>
                    @foreach ($errors->get('specifiche') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>
    <br>
    <br>
    <div>
        <div style="display:block">
            {{Form::label('guida_installazione', "Breve Guida all'Installazione")}}
            <i class="bi bi-info-circle" onclick="showTextareaTip()"></i>
        </div>
            {{Form::textarea('guida_installazione',$prodotto->guida_installazione)}}
        @if ($errors->first('guida_installazione'))
                <ul>
                    @foreach ($errors->get('guida_installazione') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>
    <br>
    <br>
    <div>
        <div style="display:block">
            {{Form::label('note_uso',"Note d'uso")}}
            <i class="bi bi-info-circle" onclick="showTextareaTip()"></i>
        </div>
            {{Form::textarea('note_uso', $prodotto->note_uso)}}
        @if ($errors->first('note_uso'))
                <ul>
                    @foreach ($errors->get('note_uso') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>
    <br>
    <br>
    <div>
        {{ Form::label('file_img','Immagine Prodotto') }}
        {{ Form::file('file_img') }}
        @if ($errors->first('file_img'))
                <ul>
                    @foreach ($errors->get('file_img') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                @php
                $hasImage = $prodotto->file_img != null && !empty($prodotto->file_img);
                    if($hasImage)  
                        $urlImg = asset('storage/images/products/') ."/" . $prodotto->file_img;
                    else 
                        $urlImg = "#";
                @endphp

        <img id="product-preview-image" src="{{ $urlImg }}" width="150px" height="150px" alt="product-image">
        <button type="button" id="delete-preview-img" onclick="deletePreview()" style="display:none">Cancella immagine caricata</button>

        @if($hasImage)
            <button type="button" id="delete-current-img" onclick="deleteCurrent()" style="display:block" data-url="{{ route(Auth::user()->role . '.prodotto.delete-img', ['prodottoID' => $prodotto->ID])}}">Rimuovi immagine corrente</button>
        @endif
    </div>
    <br>
    <br>
    @can('isAdmin')
        <div>
            {{form::label('utenteID','Selezionare membro staff a cui assegnare il prodotto')}}
            {{form::select('utenteID',$staffUtenti,$prodotto->utenteID,['placeholder'=>'Non assegnato'])}}
        <div>
    @endcan
    {{ Form::hidden ('_method', 'PUT') }}
    {{ Form::submit ('Conferma' ) }}
    {{ Form::reset ('Annulla modifiche') }}

    </div>
{{Form::close()}}
