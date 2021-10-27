
<div id="form-modify-faq" class="form-admin-data" >
{{  Form::open(array('route' => [Auth::user()->role . '.malfunzionamento.store', $prodottoID], 'id' =>'insert-malfunzionamento', 'Method'=>'POST')) }}

{{  Form::textarea('descrizione','')}}
            @if ($errors->first('descrizione'))
                <ul>
                    @foreach ($errors->get('descrizione') as $message)
                        <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
<br>
<br>
{{  Form::submit('Inserisci Malfunzionamento')}}
<br>
{{  Form::reset('Annulla modifiche')}}
{{  Form::close()}}
</div>