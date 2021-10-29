@extends('layouts.admin', ['title' => $title])

@section('content')
    <div class="container-form">
        <div class="form-header">
            <h2 class="form-title">{{ $title }}</h2>
            {!! link_to_route(Auth::user()->role . '.malfunzionamenti.table', 'Torna a Gestione malfunzionamenti', ['prodottoID' => $prodottoID], ['class' => "button btn-back"]) !!}
        </div>

        @if($action === 'insert')
            @include('forms.insert-malfunzionamento')
        @elseif($action === 'modify')
            @include('forms.modify-malfunzionamento')
        @endif
    </div>
@endsection

