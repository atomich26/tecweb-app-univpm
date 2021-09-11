@extends('layouts.forms', ['title' => 'Inserisci nuova FAQ'])

@section('content')
    @include('forms.insertFAQ')
    <br>
    <br>
    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection

@section('js-scripts')
<script>
    var length = 0;
    var max = document.querySelector('#max-counter').textContent;
    var textDomanda = document.querySelector('textarea#domanda-text-area');
    var counterDomanda = document.querySelector('#domanda-counter');
    var currentLength = document.querySelector('#current-length');

    textDomanda.addEventListener('input', () =>{
       length = textDomanda.value.length;
        currentLength.innerHTML = length;
        if(length>= max)
            counterDomanda.style.color = "red";
        else
            counterDomanda.style.color = "black";
    });
</script>
@endsection
