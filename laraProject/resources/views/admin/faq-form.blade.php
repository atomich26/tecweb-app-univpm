@extends('layouts.admin', ['title' => $title])

@section('content')

    @if($action === 'insert')
        @include('forms.insert-faq')
    @elseif($action === 'modify')
        @include('forms.modify-faq')
    @endif

    <a href = "{{route('admin.faq.table')}}"> Torna alla Tabella FAQ</a>
@endsection

@section('js-scripts')
    <script type="module"> 
        import { loadImageProduct, deletePreview } from '{{ asset('js/form.js')}}';
        window.onload = () => {
            loadImageProduct();
            deletePreview();
        };
    </script>
@endsection