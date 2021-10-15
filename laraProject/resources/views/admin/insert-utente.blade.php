@extends('layouts.forms', ['title' => 'Registrazione Utente'])

@section('content')
    @include('forms.insert-utente')
    <br>
   
    <br>
    <a href = "{{route('utenti.table')}}"> Torna alla Tabella Utenti</a>
@endsection

