
{{  Form::open (array('route' => ['utente.update', $user->ID] , 'method' => 'POST'))}}

<h2>Modifica Utente</h2>
    <div>
            {{  Form::label ('username', 'Username' )}}
            {{  Form::text ('username', $user->username)  }}
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
            {{  Form::text ('nome', $user->nome)  }}
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
            {{  Form::text ('cognome', $user->cognome)}}
            @if ($errors->first('cognome'))
                <ul>
                    @foreach($errors->get('cognome') as $message)
                    <li>{{$message}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div>
        {{Form::label('file_img','Nuova Foto Profilo')}}
        {{Form::file('file_img')}}
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
            {{  Form::date('data_nascita', $user->data_nascita )}}
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
            {{  Form::email ('email', $user->email)}}
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
            {{  Form::text ('telefono', $user->telefono)}}
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
            {{  Form::radio ('role', 'tecnico', true, ['id' => 'tecnico', 'name' => 'role']) }} Tecnico
            {{  Form::radio ('role', 'staff', false,['id' => 'staff', 'name' => 'role']) }} Staff
        </div>
        
        <div id="centroID">
            {{  Form::label ('centroID', 'Centro Assistenza')}}
            {{  Form::select ('centroID', $centri, $user->centroID, ['placeholder' => '0 - Nessun Centro'])}}
        </div>

        
       

        
        
        
     
        
{{  Form::hidden('_method', 'PUT')}}
{{  Form::submit ('Modifica Utente')  }}
{{  Form::reset ('Reset')}}

{{  Form::close()}}

<script>

    $(document).ready(function(){
    $('input[type=radio]').load(function(){
        if(this.value === "tecnico") 
        $("#centroID").show();
        if(this.value === "staff")
        $("#centroID").hide();
        });
    });
  
    $(document).ready(function(){
    $('input[type=radio]').click(function(){
        if(this.value === "tecnico") 
        $("#centroID").show();
        if(this.value === "staff")
        $("#centroID").hide();
    });
});

</script>
     