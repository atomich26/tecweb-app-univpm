@extends('layouts.forms', ['title' => 'Inserisci nuovo Prodotto'])

@section('content')
    @include('forms.insertProduct')
    <br>
    <br>
    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection