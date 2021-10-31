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
                <a href="{{ route(Auth::user()->role . '.malfunzionamenti.table', ['prodottoID' => $prodotto->ID])}}" class="malfunzionamenti-btn button"><i class="bi bi-gear"></i>&nbsp;&nbsp;Modifica i malfunzionamenti noti</a>
            </div>
        @endcan
    </div>
</div>

<div class="container">
    <div id="descrizione-prodotto" class="product-text">
        <h3>Descrizione:</h3>
        <div class="product-text-content">
            <p>{{ $prodotto->descrizione ?? "Descrizione non disponibile" }}</p>
        </div>
    </div>

    <div id="installazione-prodotto" class="product-text">
        <h3>Installazione:</h3>
        <div class="product-text-content">
            @include('helpers.product-content-list', ['stringToSplit' => $prodotto->guida_installazione])
        </div>
    </div>

    <div id="note-uso-prodotto" class="product-text">
        <h3>Note di buon uso:</h3>
        <div class="product-text-content">
            @include('helpers.product-content-list', ['stringToSplit' => $prodotto->note_uso])
        </div>
    </div>

    @if(Auth::check())
    <div id="malfunzionamento-prodotto" class="product-text">
        <h3>Malfunzionamenti noti:</h3>
        <div class="product-text-content">
        @if(count($prodotto->malfunzionamenti) > 0)
            <ul style="padding: 20px 40px!important">
                @foreach($prodotto->malfunzionamenti as $malfunzionamento)
                    <li>
                        <h4 class="malfunzionamento"> {{$malfunzionamento->descrizione}}</h4>
                        @if(isset($malfunzionamento->soluzioni))
                            <ul style="padding: 10px!important">
                                @if(count($malfunzionamento->soluzioni) < 1)
                                    <li><p>Non sono state registrate soluzioni per questo malfunzionamento.</p></li>
                                @else 
                                    @foreach ($malfunzionamento->soluzioni as $soluzione)
                                        <li class="soluzione"><p>{{$soluzione->descrizione}}</p></li>
                                    @endforeach
                                @endif
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <h4>Nessun malfunzionamento disponibile.</h4>
        @endif
    </div>
    @endif
    </div>
</div>

@endsection
