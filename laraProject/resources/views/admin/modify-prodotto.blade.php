@extends('layouts.forms', ['title' => 'Modifica Prodotto'])

@section('content')
    @include('forms.modify-prodotto')
    <br>
    <br>
    <a href = "{{route('prodotti.table')}}"> Torna alla Tabella Prodotti</a>
@endsection