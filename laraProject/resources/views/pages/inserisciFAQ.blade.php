@extends('layouts.forms', ['title' => 'Inserisci nuova FAQ'])

@section('content')
    @include('forms.insertFAQ')
    <br>
    <br>
    <a href = "{{route('home')}}"> Torna alla Home</a>
@endsection