@extends('layouts.forms', ['title' => 'Modifica Soluzione' ])

@section('content')
    @include('forms.modify-soluzione')

    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection

