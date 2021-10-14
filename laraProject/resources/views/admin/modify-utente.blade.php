@extends('layouts.forms', ['title' => 'Modifica Utente'])

@section('content')
    @include('forms.modify-utente')
    <br>
    <br>
    <a href = "{{route('utenti.table')}}"> Torna alla Tabella Utenti</a>
@endsection