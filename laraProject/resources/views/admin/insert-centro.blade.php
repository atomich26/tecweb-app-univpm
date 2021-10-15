@extends('layouts.forms', ['title' => 'Inserisci nuovo Centro Assistenza'])

@section('content')
    @include('forms.insert-centro')
    <br>
    <br>
    <a href = "{{route('catalogo.view')}}"> Torna alla Home</a>
@endsection