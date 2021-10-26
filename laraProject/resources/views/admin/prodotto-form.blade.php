@extends('layouts.admin', ['title' => $title])

@section('content')
   
    @if($action === 'insert')
        @include('forms.insert-prodotto')
    @elseif($action === 'modify')
        @include('forms.modify-prodotto')
    @endif

    <a href= "{{route(Auth::user()->role . '.prodotti.table')}}"> Torna alla Tabella Prodotti</a>
@endsection

