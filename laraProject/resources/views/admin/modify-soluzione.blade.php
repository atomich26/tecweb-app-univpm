@extends('layouts.forms', ['title' => 'Modifica Soluzione' ])

@section('content')
    @include('forms.modify-soluzione')

    <a href = "{{route('prodotti.table')}}"> Torna alla Tabella dei Prodotti</a>
@endsection

