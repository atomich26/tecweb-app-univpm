@extends('layouts.forms', ['title' => 'Modifica malfunzionamento per $product->nome' ])

@section('content')
    @include('forms.modify-malfunzionamento')

    <a href = "{{route('catalogo.view')}}"> Torna alla Home</a>
@endsection

