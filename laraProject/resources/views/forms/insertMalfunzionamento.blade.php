

<form id="insertMalfunzionamento" method="post" action="{{route('insertMalfunzionamento.store', $product->ID)}}">
    @csrf
<label for="descrizione">Descrizione Malfunzionamento</label>
<input type="textarea" name="descrizione" value="{{old('descrizione')}}">
    @if ($errors->first('descrizione'))
        @foreach ($errors->get('descrizione') as $message)
             {{$message}}
        @endforeach
    @endif
<input type="submit" value="Aggiungi Malfunzionamento">
<br>
<input type="reset" value="Azzera Campo">
</form>