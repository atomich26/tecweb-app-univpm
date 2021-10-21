@extends('vendor.laravel-table.bootstrap.thead')

@php
    $staffUsers = User::where('role', 'staff')->pluck('username', 'ID');
@endphp

@section('selected-items-actions')
    @if(count($staffUsers) > 0)
        <div class="px-1 thead-widget bulkActionInput">
            <div class="input-group">
                {!! Form::select('Utente', $staffUsers,'', ['id' => 'assign-user-select', 'placeholder' => 'Tutti']) !!}
                <div class="input-group-append">
                    <button class="button bulkActionBtn" id="assign-btn" onclick="assegnaProdottiUtente(event)" data-url="{{ route('admin.prodotti.assign') }}" value="Assegna prodotti a utente"><i class="bi bi-person-plus-fill"></i></button>
                </div>
            </div>
        </div>
    @endif
@endsection