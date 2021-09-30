@extends('layouts.admin')

@section('js-scripts')

<script type="module"> 
    import { loadTable } from '{{ asset('js/tables.js')}}';
    window.onload = loadTable();
</script>

@endsection