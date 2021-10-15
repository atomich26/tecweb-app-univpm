@extends('layouts.forms', ['title' => 'Inserimento Soluzione' ])

@section('content')
    @include('forms.insert-soluzione')

    <a href = "{{route('catalogo.view')}}"> Torna alla Home</a>
@endsection

