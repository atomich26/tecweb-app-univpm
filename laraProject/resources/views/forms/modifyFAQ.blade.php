{{  Form::open(array('route' => ['modificaFaq.update', $faq->faqId] , 'files' => true, 'method'=>'POST'))  }}

<h2>Modulo modifica FAQ</h2>
        <div class="wrap-input">
        {{  Form::label('domanda', 'Domanda')}}
        {{  Form::textarea('domanda', $faq->domanda)}}
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
        {{  Form::textarea('risposta', $faq->risposta)}}
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
{{  Form::hidden ('_method', 'PUT')}}
{{  Form::close()}}