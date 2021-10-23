@extends('layouts.forms', ['title' => 'Modifica Prodotto'])

@section('content')
    @include('forms.modify-prodotto')
    <br>
    <br>
    <a href = "{{route(Auth::user()->role . '.prodotti.table')}}"> Torna alla Tabella Dei Prodotti</a>
@endsection