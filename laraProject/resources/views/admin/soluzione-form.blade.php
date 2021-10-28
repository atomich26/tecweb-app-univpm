@extends('layouts.admin', ['title' => 'Inserimento Soluzione' ])

@section('content')
    <h2>{{ $title }}</h2>
    <a href = "{{route(Auth::user()->role . '.soluzioni.table', ['prodottoID' => $prodottoID, 'malfunzionamentoID' =>$malfunzionamento->ID])}}"> Torna alla Tabella Prodotti</a>

    @if($action === 'insert')
        @include('forms.insert-soluzione')
    @elseif($action === 'modify')
        @include('forms.modify-soluzione')
    @endif

@endsection

