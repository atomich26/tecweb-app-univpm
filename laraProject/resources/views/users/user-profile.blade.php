@extends('layouts.public', ['title' => Auth::user()->nome . " " . Auth::user()->cognome ])

@section('content')
    <div class="user-profile-container container">
        <h1 class="user-welcome">Riepilogo dei tuoi dati</h1>
        <div class="flex-v-center" style="height:100%">
            <div class="col" style="text-align:center">
                @include('helpers.user-profile-image', ['userImgName' => Auth::user()->file_img, 'width' => 300, 'height' => '300'])
            </div>

            <div class="col user-data-info">
                <ul>
                    <li class="multi-value">
                        <div>
                            <h3><strong>Nome:</strong></h3>
                            <p class="info-label-value">{{ Auth::user()->nome }}</p>
                        </div>
                        <div style="margin-left:40px">
                            <h3><strong>Cognome:</strong></h3>
                            <p class="info-label-value">{{ Auth::user()->cognome }}</p>
                        </div>
                    </li>
                    <li>
                        <h3><strong>Username:</strong></h3>
                        <p class="info-label-value">{{ Auth::user()->username }}</p>
                    </li>
                    <li>
                        <h3><strong>Email:</strong></h3>
                        <p class="info-label-value">{{ Auth::user()->email }}</p>
                    </li>
                    <li>
                        <h3><strong>Telefono:</strong></span></h3>
                        <p class="info-label-value">+39 {{ Auth::user()->telefono }}</p>
                    </li>
                    <li>
                        <h3><strong>Ruolo:</strong><span></span></h3>
                        <p class="info-label-value">{{ Auth::user()->role }}</p>
                    </li>

                    @can('isTecnico')
                        <li>
                            <h3><strong>Centro assistenza:</strong></h3>
                            @php
                                 $tecnicoUser = new Tecnico(Auth::user()->ID);
                            @endphp
                            <p class="info-label-value">{{ $tecnicoUser->getCentroAssistenza()->ragione_sociale }}</p>
                        </li>
                    @endcan
                </ul>
            </div>

            <div class="col user-account-info">
                <ul>
                    <li class="account-info">
                        <h3>Account creato:</h4>
                        <p class="info-label-value">{{ Auth::user()->created_at->format('d/m/Y') }} alle {{ Auth::user()->created_at->format('H:i') }}</p>
                    </li>
                    <li class="account-info">
                        <h3>Modificato:</h4>
                        <p class="info-label-value">{{ Auth::user()->created_at->format('d/m/Y') ?? "Non disponibile"}} alle {{ Auth::user()->created_at->format('H:i') ?? "Non disponibile"}}<p>
                    </li>
                    <li class="account-info">
                        <h3>Ultimo accesso:</h4>
                        <p class="info-label-value">{{ Cache::get('last_login_timestamp')->format('d/m/Y') ?? "Non disponibile"}} alle {{ Cache::get('last_login_timestamp')->format('H:i') ?? "Non disponibile"}}<p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
