@extends('layouts.public', ['title' => $prodotto->nome . " - " . $prodotto->modello, 'headerPage' => false])

@section('content')
<div class="header-product-page flex-v-center">
    <div class="product-overview container" style="height: auto; width:100%">
        <h1 class="product-name">{{ $prodotto->nome ?? 'Prodotto senza nome'}}</h1>

        @include('helpers.product-image', ['image' => $prodotto->file_img, 'class' => 'product-image'])

        <h2 id="modello">Modello: <span>{{$prodotto->modello ?? 'Numero modello mancante'}}</span></h2>
        <div id="specifiche-prodotto">
            <h2>Specifiche:</h2>
            @include('helpers.product-content-list', ['stringToSplit' => $prodotto->specifiche])
        </div>

        @can('editProdotto', $prodotto->ID)
            <div class="product-buttons">
                <a href="{{ route(Auth::user()->role . '.prodotto.modify', ['prodottoID' => $prodotto->ID]) }}" class="edit-prodotto-btn button"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Modifica prodotto</a>
                <a href="#" class="malfunzionamenti-btn button"><i class="bi bi-gear"></i>&nbsp;&nbsp;Modifica i malfunzionamenti noti</a>
            </div>
        @endcan
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
    
    <div id="malfunzionamento-prodotto" class="product-text">
        @if(Auth::check())
            <h3>Malfunzionamenti noti:</h3>
            @if(isset($prodotto->malfunzionamenti))
                <ul>
                    @foreach($prodotto->malfunzionamenti as $malfunzionamento)
                        <li>
                            <h4 class="malfunzionamento-content"> {{$malfunzionamento->descrizione}}</h4>
                            @if(isset($malfunzionamento->soluzioni))
                                <ol>
                                    @foreach ($malfunzionamento->soluzioni as $soluzione)
                                        <li class="soluzione-content"><p>{{$soluzione->descrizione}}</p></li>
                                    @endforeach
                                </ol>
                            @endif
                        </li>
                    @endforeach
                </ul>         
            @endif
        @endif
    </div>
    </div>
</div>

@endsection
