@extends('layouts.forms', ['title' => 'Modifica FAQ'])

@section('content')
    @include('forms.modifyFAQ')
    <br>
    <br>
    <a href = "{{route('home')}}"> Torna alla Home</a>
@endsection