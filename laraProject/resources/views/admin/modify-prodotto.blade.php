@extends('layouts.forms', ['title' => 'Modifica Prodotto'])

@section('content')
    @include('forms.modify-prodotto')
    <br>
    <br>
    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection