@extends('layouts.forms', ['title' => 'Modifica Utente'])

@section('content')
    @include('forms.modify-utente')
    <br>
    <br>
    <a href = "{{route('catalogo.view')}}"> Torna alla Home</a>
@endsection