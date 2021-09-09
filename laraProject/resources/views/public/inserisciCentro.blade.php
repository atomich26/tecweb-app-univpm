@extends('layouts.forms', ['title' => 'Inserisci nuovo Centro Assistenza'])

@section('content')
    @include('forms.insertCenter')
    <br>
    <br>
    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection