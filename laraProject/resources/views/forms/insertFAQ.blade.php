@php
    use Illuminate\Http\Request;
@endphp

<div class="form-blank">
    {{  Form::open(array('route' => 'insertFAQ.store', 'id' =>'insertFaq' , 'files' => true))  }}

    <h2>Modulo inserimento FAQ</h2>
        <div class="wrap-input">
        {{  Form::label('domanda', 'Domanda')}}
        {{  Form::textarea('domanda', old('domanda'), ['placeholder' => 'Inserisci qui la domanda']) }}
        @if ($errors->first('domanda'))
                <ul>
                    @foreach ($errors->get('domanda') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
        </div>

        <div class="wrap-input">
        {{  Form::label('risposta',  'Risposta')}}
        {{  Form::textarea('risposta', old('risposta'), ['placeholder' => 'Inserisci qui la risposta']) }}
        @if ($errors->first('risposta'))
                <ul>
                    @foreach ($errors->get('risposta') as $message)
                    <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
        </div>

    <div>
    {{  Form::submit ('Conferma')}}
    </div>

    <div>
    {{  Form::reset ('Azzera')}}
    </div>

{{Form::close()}}
</div>
