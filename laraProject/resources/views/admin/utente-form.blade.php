@extends('layouts.admin', ['title' => $title])

@section('content')

    @if($action === 'insert')
        @include('forms.insert-utente')
    @elseif($action === 'modify')
        @include('forms.modify-utente')
    @endif

    <br>
    <br>

    <a href = "{{route('admin.utenti.table')}}"> Torna alla Tabella Utenti</a>
@endsection


@section('js-scripts')
<script>
    $(document).ready(function(){
        $('input[type=radio]').click(function(){
            (this.value === "tecnico") ? $("#centroID").show() : $("#centroID").hide();
        });
    });
</script>

@endsection
