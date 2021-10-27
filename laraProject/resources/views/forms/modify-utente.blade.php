{{  Form::open (array('route' => ['admin.utente.update', $utente->ID], 'id' => 'modify-utente', 'method' => 'POST'))}}

<h2>{{ $title }}</h2>
    <div>
            {{  Form::label ('username', 'Username' )}}
            {{  Form::text ('username', $utente->username)  }}
            @if ($errors->first('username'))
                <ul>
                    @foreach ($errors->get('username') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>
    <div>
            {{  Form::label ('password', 'Password')}}
            {{  Form::password ('password')  }}
            @if ($errors->first('password'))
                <ul>
                    @foreach ($errors->get('password') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
    <div>
            {{  Form::label ('password_confirmation', 'Conferma Password')}}
            {{  Form::password ('password_confirmation')  }}
            @if ($errors->first('password'))
                    <ul>
                        @foreach ($errors->get('password') as $message)
                        <li class="errors">{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                

    
    <div>
            {{  Form::label ('nome', 'Nome')  }}
            {{  Form::text ('nome', $utente->nome)  }}
          @if ($errors->first('nome'))
                <ul>
                    @foreach ($errors->get('nome') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div>
            {{  Form::label ('cognome', 'Cognome')}}
            {{  Form::text ('cognome', $utente->cognome)}}
            @if ($errors->first('cognome'))
                <ul>
                    @foreach($errors->get('cognome') as $message)
                    <li>{{$message}}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div>
        {{ Form::hidden('current_img', $utente->file_img ) }}
        <img class="preview-img" src=""/>
        {{ Form::label('file_img','Nuova Foto Profilo') }}
        {{ Form::file('file_img') }}
        @if ($errors->first('file_img'))
            <ul>
                @foreach ($errors->get('file_img') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <div>
            {{  Form::label ('data_nascita', 'Data di Nascita')}}
            {{  Form::date('data_nascita', $utente->data_nascita )}}
            @if ($errors->first('data_nascita'))
                <ul>
                    @foreach($errors->get('data_nascita') as $message)
                    <li>{{$message}}</li>
                    @endforeach
                </ul>   
            @endif
        </div>

        <div>
            {{  Form::label ('email', 'Indirizzo E-Mail')}}
            {{  Form::email ('email', $utente->email)}}
            @if ($errors->first('email'))
                <ul>
                    @foreach($errors->get('email') as $message)
                    <li>{{$message}}</li>
                    @endforeach
                </ul> 
            @endif
        </div>


	    <div>
            {{  Form::label ('telefono', 'Telefono')}}
            {{  Form::text ('telefono', $utente->telefono)}}
            
            @if ($errors->first('telefono'))
            <ul>
                @foreach($errors->get('telefono') as $message)
                    <li>{{$message}}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <div>
            {{  Form::label ('role', 'Ruolo',['name'=>'role']) }}
            {{  Form::radio ('role', 'tecnico', $utente->role === 'tecnico', ['id' => 'tecnico', 'name' => 'role']) }} Tecnico
            {{  Form::radio ('role', 'staff', $utente->role === 'staff', ['id' => 'staff', 'name' => 'role']) }} Staff
        </div>
        
        <div id="centroID">
            {{  Form::label ('centroID', 'Centro Assistenza')}}
            {{  Form::select ('centroID', $centri, $utente->centroID, ['placeholder' => 'Nessun centro'])}}
        </div>        
{{ Form::hidden('_method', 'PUT') }}
{{ Form::submit ('Modifica Utente') }}
{{ Form::reset ('Annulla modifiche') }}
{{ Form::close() }}

<script>
    $(document).ready(function(){
        let inputRadio = $('input[name="role"]:checked');
        
        let changeStatus = (obj) => {
            if(obj.val() === "tecnico") 
                $("#centroID").show();
            else
                $("#centroID").hide();
        };

        changeStatus(inputRadio);
        
        inputRadio.change(function(event){
            changeStatus($(event.target));
        });

        $('form#modify-utente').on('reset', function(event){
            changeStatus($(event.target));
        });
    });
</script>
     