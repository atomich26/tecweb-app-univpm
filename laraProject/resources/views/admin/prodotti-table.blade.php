@extends('layouts.admin', ['title' => 'Gestisci prodotti'])

@section('content')
    {{ $table}}
@endsection

@section('js-scripts')
<script>
    let btn = document.querySelector('form#destroy-2 button');
    btn.addEventListener('click', (e) => {
        confirm(btn.getAttribute('data-confirm'));
    });
</script>
@endsection