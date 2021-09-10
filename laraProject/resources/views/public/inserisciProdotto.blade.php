@extends('layouts.forms', ['title' => 'Inserisci un nuovo prodotto'])

@section('content')
    @include('forms.insertProduct')
    <br>
    <br>
    <a href = "{{route('catalogo')}}"> Torna alla Home</a>
@endsection

@section('js-scripts')
<script>var preview_img = document.querySelector("input[type='file']");
preview_img.addEventListener('input', () => {
    document.querySelector('#delete-preview-img').style.display = "block";
    document.querySelector('#product-preview-image').src= URL.createObjectURL(preview_img.files[0]);
});

function deletePreview(e){
    preview_img.value = null;
    document.querySelector('#product-preview-image').src = "#";
    document.querySelector('#delete-preview-img').style.display = "none";
}
</script>
@endsection

