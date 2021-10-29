@extends('layouts.admin', ['title' => $title])

@section('content')
    <div class="container-form">
        <div class="form-header">
            <h2 class="form-title">{{ $title }}</h2>
            {!! link_to_route(Auth::user()->role . '.centri.table', 'Torna a Gestione centri assistenza', null, ['class' => "button btn-back"]) !!}
        </div>
        @if($action === 'insert')
            @include('forms.insert-centro')
        @elseif($action === 'modify')
            @include('forms.modify-centro')
        @endif
    </div>
@endsection
