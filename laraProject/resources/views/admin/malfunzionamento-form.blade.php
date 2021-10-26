@extends('layouts.admin', ['title' => 'Inserisci malfunzionamento per {{$product->nome}}' ])

@section('content')
    @include('forms.insert-malfunzionamento')

    <a href = "{{route('prodotti.table')}}"> Torna alla Tabella Prodotti</a>
@endsection

