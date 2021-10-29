@extends('layouts.admin', ['title' => $title])

@section('content')

    <div class="container-form">
        <div class="form-header">
            <h2 class="form-title">{{ $title }}</h2>
            {!! link_to_route(Auth::user()->role . '.faq.table', 'Torna a Gestione faq', null, ['class' => "button btn-back"]) !!}
        </div>
        @if($action === 'insert')
            @include('forms.insert-faq')
        @elseif($action === 'modify')
            @include('forms.modify-faq')
        @endif
    </div>

@endsection