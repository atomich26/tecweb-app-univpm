@extends('layouts.forms', ['title' => 'Inserisci un nuovo prodotto'])

@section('content')
    @include('forms.insert-prodotto')
    <br>
    <br>
    <a href= "{{route('admin.prodotti.table')}}"> Torna alla Tabella Prodotti</a>
@endsection

