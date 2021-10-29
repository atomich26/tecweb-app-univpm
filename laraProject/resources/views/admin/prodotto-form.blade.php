@extends('layouts.admin', ['title' => $title])

@section('content')
   
    <div class="container-form">
        <div class="form-header">
            <h2 class="form-title">{{ $title }}</h2>
            {!! link_to_route(Auth::user()->role . '.prodotti.table', 'Torna a Gestione prodotti', null, ['class' => "button btn-back"]) !!}
        </div>
        @if($action === 'insert')
            @include('forms.insert-prodotto')
        @elseif($action === 'modify')
            @include('forms.modify-prodotto')
        @endif
    </div>
@endsection

