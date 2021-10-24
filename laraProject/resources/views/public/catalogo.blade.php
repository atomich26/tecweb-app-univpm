@extends('layouts.public', ['title' => 'Catalogo', 'headerPage' => true])

@php
    $imgCover = 'catalog_cover.jpg';
    $description = 'Da anni produciamo elettrodomestici di qualità, sempre al tuo fianco e dotati delle ultime tecnologie. Cerca nel catalogo quello giusto per te!'
@endphp

@section('content')
<div id="results" class="wrapper container">
    <div class="main">
        <div class="catalog-title flex-v-center">

            @if(isset($categoria))
                <h2 class="widget-title">Prodotti in {{ $categoria }}</h2>
            @elseif(isset($keyword))
                <h2 class="widget-title">Trovati {{ $prodotti->total() }} prodotti per "{{ $keyword }}"</h2>
            @else
                <h2 class="widget-title">Tutti i prodotti</h2>
            @endif

            @isset($keyword)
                <a href="{{ route('catalogo.view') }}" class="cancel-search button"><i class="bi bi-x-circle"></i> Annulla ricerca</a>
            @endisset
        </div>

        <div class="products-grid">
            @if($prodotti->total() < 1)
                @include('layouts-parts.empty-content')
            @else
                @foreach ($prodotti as $prodotto)
                    <div class="product-card">
                        <div class="product-img-box">
                            @include('helpers.product-image', ['image' => $prodotto->file_img])
                        </div>
                        <div class="product-name flex-v-center">
                            @php
                                $nome = $prodotto->nome;
                                if(strlen($nome) > 55)
                                    $nome = substr($nome, 0, 55) . '...';
                            @endphp
                            <h3>{{ $nome }}</h3>
                        </div>
                        <a href="{{ route('catalogo.view', ['prodotto' => $prodotto->ID]) }}" class="product-btn">Vedi scheda tecnica</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="sidebar">
        <div class="sidebar-widget searchbar">
            <h3 class="widget-title tooltip">Cerca nel catalogo <i class="bi bi-info-circle" onclick="showSearchTip()"></i></h3>
            {!! Form::open(['route' => 'catalogo.search', 'id' => 'search-form', 'method' => 'GET']) !!}
                <div style="display:flex">
                    {!! Form::text('keyword', '', ['placeholder' => 'Cerca per descrizione..']) !!}
                    <button class="search-btn button" type="submit">{!! config('laravel-table.icon.search') !!}</button> 
                </div>
            {!! Form::close() !!}
        </div>
        <div class="sidebar-widget">
            <h3 class="widget-title">Categorie</h2>
            <ul class="categories-list">
                @foreach (Categoria::all() as $categoria)
                    <li>{!! link_to_route('catalogo.view', $categoria->nome, ['categoria' => $categoria->ID], ['class' => 'link-category']) !!}</li>
                @endforeach 
            </ul>
        </div>
        @if($prodotti->hasPages())
            <div class="sidebar-widget" style="background-color: #333f4d">
                {{ $prodotti->links()  }}
            </div>
        @endif
    </div>
</div>
@endsection

@section('js-scripts')
    <script>
        window.onload = () => {
            $('#search-form').submit((event) => {
                let keyword = $.trim($(event.target).find('input[type="text"]').val());
                
                if (!keyword || keyword.length == 0) {
                    msgProvider.send({ status: 'warning', text: 'Inserisci una parola chiave per effettuare una ricerca.' });   
                    return false;
                }
            });
        };
    </script>
@endsection