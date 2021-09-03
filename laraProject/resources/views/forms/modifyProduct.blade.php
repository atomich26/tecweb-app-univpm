@php
use App\Models\Enums\Categories;
@endphp
{{  Form::open(array('route'=>['insertProdotto.store', $product->ID], 'id'=>'modifyProdotto', 'files'=>'true', 'Method'=>'POST'))}}

<h2>Inserimento Prodotto</h2>

    <div>
        {{Form::label('nome', 'Nome del prodotto')}}
        {{Form::text('nome',$product->nome)}}
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
        {{Form::text('modello',$product->cognome)}}
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
    {{Form::select('categoriaID',Categories::CATEGORIES, $product->categoriaID)}}
        
    </div>
    <br>
    <br>
    <div>
        {{Form::label('descrizione','Descrizione del Prodotto')}}
        {{Form::textarea('descrizione',$product->descrizione)}}
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
        {{Form::textarea('specifiche',$product->specifiche)}}
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
        {{Form::textarea('guida_installazione',$product->guida_installazione)}}
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
        {{Form::textarea('note_uso', $product->note_use)}}
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
        {{Form::file('file_img')}}
        @if ($errors->first('file_img'))
                <ul>
                    @foreach ($errors->get('file_img') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>
    <br>
    <br>
    <div>
       {{form::label('utenteID','Selezionare membro staff a cui assegnare il prodotto')}}
       {{form::select('utenteID',$users,$product->userID,['placeholder'=>'Non assegnato'])}}
    <div>
    {{  Form::hidden ('_method', 'PUT')}}
    {{  Form::submit ('Conferma' )}}
    </div>
    {{Form::reset('Azzera')}}
    {{Form::close()}}
