@extends('layouts.forms', ['title' => 'Modifica Centro Assistenza'])

@section('content')
    @include('forms.modify-centro')
    <br>
    <br>
    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection