@extends('vendor.laravel-table.bootstrap.thead')

@php
    $centriAssistenza = CentroAssistenza::all()->pluck('ragione_sociale', 'ID');
@endphp

@section('selected-items-actions')
    @if(count($centriAssistenza) > 0)
        <div class="px-1 thead-widget bulkActionInput">
            <div class="input-group">
                {!! Form::select('Centro assistenza', $centriAssistenza,'', ['id' => 'assign-select', 'placeholder' => 'Nessun centro']) !!}
                <div class="input-group-append">
                    <button class="button bulkActionBtn" id="assign-btn" onclick="assignUtentiCentro(event)" data-url="{{ route('admin.prodotti.assign') }}" value="Assegna un utente al centro assistenza"><i class="bi bi-plus-circle"></i></button>
                </div>
            </div>
        </div>
    @endif
@endsection