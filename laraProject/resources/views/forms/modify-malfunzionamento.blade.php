<div id="form-modify-faq" class="form-admin-data" >
{{  Form::open(array('route' => ['modifyMalfunzionamento.update', $product->ID, $malfunzionamento->ID], 'id' =>'modify-malfunzionamento', 'Method'=>'POST')) }}

<br>
<h2>Modifica Descrizione Malfunzionamento del prodotto {{$product->nome}}</h2>
<br>
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
{{  Form::reset('Reset Campi')}}
{{  Form::close()}}
</div>