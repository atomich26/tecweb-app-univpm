<div id="form-modify-faq" class="form-admin-data" >
{{  Form::open(array('route' => [Auth::user()->role. '.malfunzionamento.update', $prodottoID, $malfunzionamento->ID], 'id' =>'modify-malfunzionamento', 'Method'=>'POST')) }}

{{  Form::textarea('descrizione',$malfunzionamento->descrizione)}}
            @if ($errors->first('descrizione'))
                <ul>
                    @foreach ($errors->get('descrizione') as $message)
                        <li class="errors">{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
<br>
<br>
{{  Form::hidden('_method','PUT')}}
{{  Form::submit('Modifica Malfunzionamento')}}
<br>
{{ Form::reset ('Annulla modifiche') }}
{{  Form::close()}}
</div>