

    {{  Form::open(array('route'=>['modifyCentro.update',$center->ID], 'files' => true, 'id'=>'insertCenter', 'method'=>'POST'))}}

<h2>Inserimento Centro Assistenza</h2>

<div>
    {{Form::label('ragione_sociale','Nominativo Azienda')}}
    {{Form::text('ragione_sociale',$center->ragione_sociale)}}
    @if ($errors->first('ragione_sociale'))
            <ul>
                @foreach ($errors->get('ragione_sociale') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif  
</div>

<div>
    {{Form::label('telefono', 'Recapito Telefonico')}}
    {{Form::text('telefono',$center->telefono)}}
    @if ($errors->first('telefono'))
            <ul>
                @foreach ($errors->get('telefono') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
</div>

<div>
    {{Form::label('email', 'E-Mail')}}
    {{Form::email('email',$center->email)}}
    @if ($errors->first('email'))
            <ul>
                @foreach ($errors->get('email') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
</div>

<div>
    {{Form::label('sito_web', 'Sito Web')}}
    {{Form::text('sito_web',$center->sito_web)}}
    @if ($errors->first('sito_web'))
            <ul>
                @foreach ($errors->get('sito_web') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
</div>

<div>
    {{Form::label('descizione','Descrizione Azienda')}}
    {{Form::textarea('descrizione',$center->descrizione)}}
    @if ($errors->first('descrizione'))
            <ul>
                @foreach ($errors->get('descrizione') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
</div>

<div>
    {{Form::label('via', 'Via')}}
    {{Form::text('via',$center->via)}}
    @if ($errors->first('via'))
            <ul>
                @foreach ($errors->get('via') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
</div>

<div>
    {{Form::label('città', 'Città')}}
    {{Form::text('città',$center->città)}}
    @if ($errors->first('città'))
            <ul>
                @foreach ($errors->get('città') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
</div>

<div>
    {{Form::label('cap','CAP')}}
    {{Form::text('cap',$center->cap)}}
    @if ($errors->first('cap'))
            <ul>
                @foreach ($errors->get('cap') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
</div>
<div>


{{Form::hidden('_method','PUT')}}
{{Form::submit('Conferma',)}}
</div>
<div>
{{Form::reset('Reset Campi')}}
</div>
{{Form::close()}}