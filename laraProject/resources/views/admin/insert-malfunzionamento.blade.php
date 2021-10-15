@extends('layouts.forms', ['title' => 'Inserisci malfunzionamento per {{$product->nome}}' ])

@section('content')
    @include('forms.insert-malfunzionamento')

    <a href = "{{route('catalogo.view')}}"> Torna alla Home</a>
@endsection

