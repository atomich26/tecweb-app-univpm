@extends('layouts.forms', ['title' => 'Inserisci un nuovo prodotto'])

@section('content')
    @include('forms.insert-prodotto')
    <br>
    <br>
    <a href = "{{route('centri.table')}}"> Torna alla Tabella Centri Assistenza</a>
@endsection

