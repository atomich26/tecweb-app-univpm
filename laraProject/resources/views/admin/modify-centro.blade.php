@extends('layouts.forms', ['title' => 'Modifica Centro Assistenza'])

@section('content')
    @include('forms.modify-centro')
    <br>
    <br>
    <a href = "{{route('centri.table')}}"> Torna alla Tabella Centri Assistenza</a>
@endsection