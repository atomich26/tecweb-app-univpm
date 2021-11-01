{{ Form::open (array('route' => ['admin.utente.update', $utente->ID], 'id' => 'user-form', 'files'=>'true', 'method' => 'POST')) }}
    
    {{ Form::hidden('_method', 'PUT') }}

    <div class="input-group">
        <div class="input-inline">
            {{ Form::label ('nome', 'Nome*')  }}
            {{ Form::text ('nome', $utente->nome, ['max-length' => config('strings.utente.nome'), 'required']) }}
            @if($errors->first('nome'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('nome') as $message)
                        <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="input-inline">
            {{ Form::label ('cognome', 'Cognome*') }}
            {{ Form::text ('cognome', $utente->cognome, ['max-length' => config('strings.utente.cognome'), 'required']) }}
            @if ($errors->first('cognome'))
                <ul class="input-errors-list">
                    @foreach($errors->get('cognome') as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="input-group">
        <div class="input-inline">
            {{ Form::label ('username', 'Username*' ) }}
            {{ Form::text ('username', $utente->username, ['max-length' => config('strings.utente.username'), 'required', 'style' => 'width: 60%'] ) }}
            @if($errors->first('username'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('username') as $message)
                        <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="input-group">
        <div class="input-inline">
            {{ Form::label ('email', 'E-Mail*') }}
            {{ Form::email ('email', $utente->email, ['max-length' => config('strings.global.default'), 'required', 'style' => 'width: 60%']) }}
            @if ($errors->first('email'))
                <ul class="input-errors-list">
                    @foreach($errors->get('email') as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="input-group">
        <div class="input-inline">
            {{ Form::label ('password', 'Password*') }}
            {{ Form::password ('password', ['max-length' => 30,'required']) }}
            @if ($errors->first('password'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('password') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="input-inline">
            {{ Form::label ('password_confirmation', 'Conferma password*') }}
            {{ Form::password ('password_confirmation', ['max-length' => 30,'required']) }}
            @if($errors->first('password'))
                <ul class="input-errors-list">
                    @foreach ($errors->get('password') as $message)
                        <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="input-group single" style="width: 50%">
        {{ Form::label('file_img','Foto profilo') }}
        <div class="preview-img-container">
            @php
                $hasImage = !($utente->file_img == null || rtrim($utente->file_img) == ''); 
            @endphp
            <img id="item-image" src="{{ $hasImage ? asset('/storage/images/profiles/' . $utente->file_img) : '' }}" style="border-radius:50%; object-fit: cover;" alt="item-image">
            <button class="button delete-preview" type="button" id="delete-preview" style="display:none"
                @if($hasImage)
                    data-url="{{ route(Auth::user()->role . '.utente.delete-img', ['utenteID' => $utente->ID])}}"
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
            {{ Form::label ('data_nascita', 'Data di Nascita*') }}
            {{ Form::date('data_nascita', $utente->data_nascita, ['required']) }}
            @if($errors->first('data_nascita'))
                <ul class="input-errors-list">
                    @foreach($errors->get('data_nascita') as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="input-inline">
            {{ Form::label ('telefono', 'Telefono*') }}
            {{ Form::text ('telefono', $utente->telefono, ['max-length' => config('strings.global.telefono'),'required']) }}
            @if ($errors->first('telefono'))
                <ul class="input-errors-list">
                    @foreach($errors->get('telefono') as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
        <div class="input-group" style="flex-direction: column">
            {{ Form::label ('role', 'Ruolo',['name'=>'role']) }}
            <div style="margin: 10px 0">
                {{ Form::radio ('role', 'tecnico', $utente->role == 'tecnico', ['id' => 'tecnico']) }} Tecnico
                {{ Form::radio ('role', 'staff', $utente->role == 'staff', ['id' => 'staff']) }} Staff
            </div>
            <div id="centroID" style="margin: 10px 0">
                {{ Form::label ('centroID', 'Centro Assistenza') }}
                {{ Form::select ('centroID', $centri, $utente->centroID, ['placeholder' => 'Nessun centro', 'style' => 'width: 40%'])}}
            </div>
        </div>
    {{ Form::submit('Aggiorna profilo utente', ['class' => 'button btn-form']) }}
    {{ Form::reset('Annulla modifiche', ['class' => 'button btn-form']) }}
{{ Form::close() }}