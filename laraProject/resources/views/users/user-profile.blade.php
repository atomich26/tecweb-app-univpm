@extends('layouts.public', ['title' => Auth::user()->nome . Auth::user()->cognome ])

@section('content')
    <div class="user-profile-container">
        <h1>Riepilogo dei tuoi dati</h1>
        <div class="flex-v-center">
            <div class="col">
                @include('helpers.user-profile-image', ['userImgName' => Auth::user()->file_img, 'width' => 300, 'height' => '300'])

            </div>

            <div class="col user-data-info">
                <h1>{{ Auth::user()->nome }} {{ Auth::user()->cognome }}</h1>
                <h3><strong>Username</strong>: <span>{{ Auth::user()->username }}</span></h3>
                <h3><strong>Nome</strong>: <span>{{ Auth::user()->nome }}</span></h3>
                <h3><strong>Cognome</strong>: <span>{{ Auth::user()->cognome }}</span></h3>
                <h3><strong>Email</strong>: <span>{{ Auth::user()->email }}</span></h3>
                <h3><strong>Telefono</strong>: <span>{{ Auth::user()->telefono }}</span></h3>
                <h3><strong>Ruolo</strong>: <span>{{ Auth::user()->role }}</span></h3>
                @can('isTecnico')
                    <h3>{{ Auth::user()->centroID}}</h3>
                @endcan

            </div>

            <div class="col user-company-info">
                <ul>
                    <li class="profile-info">
                        <h4 class="info-label">Creato:</h4>
                        <p class="info-label-value">il {{ Auth::user()->created_at->format('d/m/Y') }} alle {{ Auth::user()->created_at->format('H:i') }}</p>
                    </li>
                    <li class="profile-info">
                        <h4 class="info-label">Aggiornato:</h4>
                        <p class="info-label-value">il {{ Auth::user()->created_at->format('d/m/Y') ?? "Non disponibile"}} alle {{ Auth::user()->created_at->format('H:i') ?? "Non disponibile"}}<p>
                    </li>
                    <li class="profile-info">
                        <h4 class="info-label">Ultimo accesso:</h4>
                        <p class="info-label-value">Il {{ Auth::user()->getLastLoginCached()->format('d/m/Y') ?? "Non disponibile"}} alle {{ Auth::user()->getLastLoginCached()->format('H:i') ?? "Non disponibile"}}<p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
