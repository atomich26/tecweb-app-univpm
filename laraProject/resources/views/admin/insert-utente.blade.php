@extends('layouts.forms', ['title' => 'Registrazione Utente'])

@section('content')
    @include('forms.insert-utente')
    <br>
   
    <br>
    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection

