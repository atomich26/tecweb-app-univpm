@extends('layouts.forms', ['title' => 'Inserisci nuova FAQ'])

@section('content')
    @include('forms.insertFAQ')

    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection
