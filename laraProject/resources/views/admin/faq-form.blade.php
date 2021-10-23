@extends('layouts.forms', ['title' => $title])

@section('content')

    @if($action === 'insert')
        @include('forms.insert-faq')
    @elseif($action === 'modify')
        @include('forms.modify-faq')
    @endif

    <a href = "{{route('admin.faq.table')}}"> Torna alla Tabella FAQ</a>
@endsection