@extends('layouts.admin', ['title' => $title])

@section('content')
    <div class="container-form">
        <div class="form-header">
            <h2 class="form-title">{{ $title }}</h2>
            {!! link_to_route(Auth::user()->role . '.utenti.table', 'Torna a Gestione utenti', null, ['class' => "button btn-back"]) !!}
        </div>
        @if($action === 'insert')
            @include('forms.insert-utente')
        @elseif($action === 'modify')
            @include('forms.modify-utente')
        @endif
    </div>
@endsection

@section('js-scripts')
<script type="module"> 
    import { initInputLoadImg } from '{{ asset('js/forms.js')}}';
    
    $('document').ready(function() {
       initInputLoadImg();

    });
</script>
@endsection
