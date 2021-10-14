@extends('layouts.forms', ['title' => 'Inserimento Soluzione' ])

@section('content')
    @include('forms.insert-soluzione')

    <a href = "{{route('prodotti.table')}}"> Torna alla Tabella Prodotti</a>
@endsection

