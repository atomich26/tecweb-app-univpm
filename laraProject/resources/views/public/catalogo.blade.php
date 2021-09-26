@extends('layouts.public', ['title' => 'Catalogo prodotti'])

@section('content')
    @if(session('message'))
        <h4 class="alert-message {{ session('alertType') ?? '' }}">{{ __(session('message')) ?? '' }}</h4>
    @endif
    <h1>Catalogo</h1>
@endsection
