@extends('layouts.forms', ['title' => 'Inserisci nuovo Centro Assistenza'])

@section('content')
    @include('forms.insert-centro')
    <br>
    <br>
    <a href = "{{route('centri.table')}}"> Torna alla Tabella Centri Assistenza</a>
@endsection