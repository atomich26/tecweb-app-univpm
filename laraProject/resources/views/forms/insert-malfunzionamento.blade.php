
<div id="form-modify-faq" class="form-admin-data" >
{{  Form::open(array('route' => ['insertMalfunzionamento.store', $product->ID], 'id' =>'insert-malfunzionamento', 'Method'=>'POST')) }}

<br>
<h2>Inserisci Descrizione Malfunzionamento del prodotto {{$product->nome}}</h2>
<br>
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
{{  Form::reset('Azzera Campi')}}
{{  Form::close()}}
</div>