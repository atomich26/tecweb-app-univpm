@extends('layouts.forms', ['title' => 'Modifica malfunzionamento per $product->nome' ])

@section('content')
    @include('forms.modify-malfunzionamento')

    <a href = "{{route('prodotti.table')}}"> Torna alla Tabella Prodotti</a>
@endsection

