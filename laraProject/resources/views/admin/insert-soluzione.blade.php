@extends('layouts.forms', ['title' => 'Inserimento Soluzione' ])

@section('content')
    @include('forms.insert-soluzione')

    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection

