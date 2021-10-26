@php
use App\Models\Resources\Categoria;
@endphp
{{  Form::open(array('route'=>[Auth::user()->role . '.prodotto.update', $prodotto->ID], 'id'=>'modify-prodotto', 'files'=>'true', 'Method'=>'POST'))}}

<h2>Modifica Prodotto</h2>

    <div>
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
<<<<<<< HEAD
    {{Form::select('categoriaID', Categoria::pluck('nome', 'ID'))}}
=======
    {{Form::select('categoriaID', Categoria::pluck('nome', 'ID'), $prodotto->categoriaID)}}
>>>>>>> 9c5f39424c90d90424f0608653e2d36bc17c9315

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
        {{Form::label('specifiche', 'Specifiche del Prodotto')}}
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
        {{Form::label('guida_installazione', "Breve Guida all'Installazione")}}
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
        {{Form::label('note_uso',"Note d'uso")}}
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
        {{ Form::hidden('img_current', $prodotto->file_img) }}
        {{ Form::label('file_img','Immagine Prodotto') }}
        {{ Form::file('file_img') }}
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
    @can('isAdmin')
        <div>
            {{form::label('utenteID','Selezionare membro staff a cui assegnare il prodotto')}}
            {{form::select('utenteID',$staffUtenti,$prodotto->utenteID,['placeholder'=>'Non assegnato'])}}
        <div>
    @endcan
    {{  Form::hidden ('_method', 'PUT')}}
    {{  Form::submit ('Conferma' )}}

    </div>
{{Form::close()}}
