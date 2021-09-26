@extends('layouts.forms', ['title' => 'Inserisci malfunzionamento per {{$product->nome}} '])

@section('content')
    @include('forms.insertMalfunzionamento')

    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection

