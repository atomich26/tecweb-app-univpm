@php
use App\Models\Enums\Categories;
@endphp
{{  Form::open(array('route'=>'prodotto.store', 'id'=>'insertProdotto', 'files'=>'true'))}}

<h2>Inserimento Prodotto</h2>

    <div>
        {{Form::label('nome', 'Nome del prodotto')}}
        {{Form::text('nome','')}}
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
        {{Form::text('modello','')}}
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
    {{Form::select('categoriaID',Categories::CATEGORIES)}}

    </div>
    <br>
    <br>
    <div>
        {{Form::label('descrizione','Descrizione del Prodotto')}}
        {{Form::textarea('descrizione','')}}
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
        {{Form::label('specifiche', 'Specifiche del Prodotto')}}
        {{Form::textarea('specifiche','')}}
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
        {{Form::label('guida_installazione', "Breve Guida all'Installazione")}}
        {{Form::textarea('guida_installazione','')}}
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
        {{Form::label('note_uso',"Note d'uso")}}
        {{Form::textarea('note_uso','')}}
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
        {{Form::label('file_img','Immagine Prodotto')}}
        {{Form::file('file_img', ["accept" => 'image/*'])}}
        @if ($errors->first('file_img'))
                <ul>
                    @foreach ($errors->get('file_img') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                <img id="product-preview-image" src="#" width="150px" height="150px" alt="product-image">
                <button type="button" id="delete-preview-img" onclick="deletePreview()" style="display:none">Cancella immagine caricata</button>
    </div>
    <br>
    <br>
    <div>
       {{form::label('utenteID','Selezionare membro staff a cui assegnare il prodotto')}}
       {{form::select('utenteID',$users,null,['placeholder'=>'Non assegnato'])}}
    <div>
    {{  Form::submit ('Conferma' )}}
    </div>
    {{Form::reset('Azzera')}}
    {{Form::close()}}
