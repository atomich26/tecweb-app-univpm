@extends('layouts.admin', ['title' => $title])

@section('content')
    <div class="container-form">
        <div class="form-header">
            <h2 class="form-title">{{ $title }}</h2>
            {!! link_to_route(Auth::user()->role . '.soluzioni.table', 'Torna a Gestione soluzioni', ['prodottoID' => $prodottoID, 'malfunzionamentoID' =>$malfunzionamento->ID], ['class' => "button btn-back"]) !!}
        </div>

        @if($action === 'insert')
            @include('forms.insert-soluzione')
        @elseif($action === 'modify')
            @include('forms.modify-soluzione')
        @endif
    </div>
@endsection

