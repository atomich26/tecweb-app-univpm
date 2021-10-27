@extends('layouts.admin', ['title' => $title ])

@section('content')

    <h2>{{ $title }}</h2>
    <a href = "{{route(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodottoID])}}"> Torna alla Tabella Prodotti</a>

    @if($action === 'insert')
        @include('forms.insert-malfunzionamento')
    @elseif($action === 'modify')
        @include('forms.modify-malfunzionamento')
    @endif

@endsection

