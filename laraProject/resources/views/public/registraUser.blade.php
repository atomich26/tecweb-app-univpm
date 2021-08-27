@extends('layouts.forms', ['title' => 'Registrazione Utente'])

@section('content')
    @include('forms.registerUser')
    <br>
   
    <br>
    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection

