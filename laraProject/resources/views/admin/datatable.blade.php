@extends('layouts.admin', ['title' => $title])

@section('content')
    {{ $table }}
@endsection

@section('js-scripts')

<script type="module"> 
    import { loadTable } from '{{ asset('js/tables.js')}}';
    window.onload = loadTable();
</script>

@endsection