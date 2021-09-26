@extends('layouts.forms', ['title' => 'Inserisci un nuovo prodotto'])

@section('content')
    @include('forms.insert-prodotto')
    <br>
    <br>
    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection

