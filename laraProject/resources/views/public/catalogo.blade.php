@extends('layouts.public', ['title' => 'Catalogo', 'headerPage' => true])

@php
    use App\Models\Enums\Category;
    
    $imgCover = 'catalog_cover.jpg';
    $description = 'Da anni produciamo elettrodomestici di qualità, sempre al tuo fianco e dotati delle ultime tecnologie. Cerca nel catalogo quello giusto per te!'
@endphp

@section('content')
<div class="wrapper container">
    <div class="main">
        <div class="catalog-nav flex-v-center">
            <h2 class="widget-title">Prodotti</h2>
            <div class="catalog-paginator">Paginator</div>
        </div>
        <div class="products-grid">
            @foreach ($prodotti as $prodotto)
            <div class="product-card">
                @include('helpers.product-image', ['image' => $prodotto->file_img])
                <h3>{{ $prodotto->nome }}</h3>
            </div>
            @endforeach
        </div>
    </div>
    <div class="sidebar">
        <div class="sidebar-widget searchbar">
            <h3 class="widget-title tooltip">Cerca nel catalogo <i class="bi bi-info-circle" onclick="showSearchTip()"></i></h3>
                {!! Form::open(array('route' => 'catalogo.search')) !!}
                <div style="display:flex">
                    {!! Form::text('keyword', '', ['placeholder' => 'Cerca per descrizione..']) !!}
                    <button class="search-btn button" type="submit">{!! config('laravel-table.icon.search') !!}</button> 
                </div>
        </div>
        <div class="sidebar-widget">
            <h3 class="widget-title">Categorie</h2>
            <ul class="categories-list">
             
            </ul>
        </div>
        @if($prodotti->hasPages())
            <div class="sidebar-widget">
                <h3 class="widget-title">Paginazione</h2>
                {{ $prodotti->links()  }}
            </div>
        @endif
        {!! Form::close() !!}
    </div>
</div>
@endsection