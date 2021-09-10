@extends('layouts.public', ['title' => $prodotto->nome . " - " . $prodotto->modello])

@section('content')

<div class="header-product-page">
    <div class="product-overview container">
        <h1 class="product-name">{{ $prodotto->nome ?? 'Prodotto senza nome'}}</h1>
        <img class="product-image" src="{{ asset('storage/images/products/lavatrici_asciugatrici/'. $prodotto->file_img)}}">

        <h2 id="modello">Modello: <span>{{$prodotto->modello ?? 'Numero modello mancante'}}</span></h2>
        <div id="specifiche-prodotto">
            <h2>Specifiche:</h2>
            @include('helpers.product-content-list', ['stringToSplit' => $prodotto->specifiche])
        </div>

        @auth
            <div class="product-buttons">
                <a href="#" class="malfunzionamenti-btn button">Ricerca e risoluzione dei problemi</a>

                @can('isAdmin')
                    {!! link_to_route('prodotto.modify', 'Modifica prodotto',['productID' => $prodotto->ID], ['class' => 'edit-prodotto-btn button']) !!}
                @endcan

                @can('editMalfunzionamenti', $prodotto)
                    <a href="#" class="edit-malfunzionamenti-btn button">Modifica malfunzionamenti</a>
                @endcan
            </div>
        @endauth
    </div>
</div>

<div class="container">
    <div id="descrizione-prodotto" class="product-text">
        <h3>Descrizione:</h3>
        <p>{{ $prodotto->descrizione ?? "Descrizione non disponibile" }}</p>
    </div>

    <div id="installazione-prodotto" class="product-text">
        <h3>Installazione:</h3>
        @include('helpers.product-content-list', ['stringToSplit' => $prodotto->guida_installazione])
    </div>

    <div id="note-uso-prodotto" class="product-text">
        <h3>Note di buon uso:</h3>
        @include('helpers.product-content-list', ['stringToSplit' => $prodotto->note_uso])
    </div>
</div>

@endsection
