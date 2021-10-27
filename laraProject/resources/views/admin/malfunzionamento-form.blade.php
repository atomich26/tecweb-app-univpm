@extends('layouts.admin', ['title' => $title ])

@section('content')

    @if($action === 'insert')
        @include('forms.insert-malfunzionamento')
    @elseif($action === 'modify')
        @include('forms.modify-malfunzionamento')
    @endif

    <a href = "{{route(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodotto->ID])}}"> Torna alla Tabella Prodotti</a>
@endsection

