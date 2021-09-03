@extends('layouts.forms', ['title' => 'Modifica Prodotto'])

@section('content')
    @include('forms.modifyProduct')
    <br>
    <br>
    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection