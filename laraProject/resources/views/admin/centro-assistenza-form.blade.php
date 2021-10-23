@extends('layouts.forms', ['title' => $title])

@section('content')
    
    @if($action === 'insert')
        @include('forms.insert-centro')
    @elseif($action === 'modify')
        @include('forms.modify-centro')
    @endif

    <br>
    <br>
    <a href= "{{route('admin.centri.table')}}"> Torna alla Tabella Centri Assistenza</a>
@endsection