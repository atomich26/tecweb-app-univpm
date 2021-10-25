@extends('layouts.public', ['title' => $user->nome . " " . $user->cognome, 'headerPage' => false])

@section('content')
    <div class="user-profile-container container" style="padding: 50px 5%">
        <h1 class="user-welcome">Riepilogo dei tuoi dati</h1>
        <div class="flex-v-center" style="height:100%">
            <div class="col">
                @include('helpers.user-profile-image', ['image' => $user->file_img, 'class' => 'user-img'])
            </div>

            <div class="col user-data-info">
                <ul>
                    <li class="multi-value">
                        <div>
                            <h3><strong>Nome:</strong></h3>
                            <p class="info-label-value">{{ $user->nome }}</p>
                        </div>
                        <div style="margin-left:40px">
                            <h3><strong>Cognome:</strong></h3>
                            <p class="info-label-value">{{ $user->cognome }}</p>
                        </div>
                    </li>
                    <li>
                        <h3><strong>Username:</strong></h3>
                        <p class="info-label-value">{{ $user->username }}</p>
                    </li>
                    <li>
                        <h3><strong>Email:</strong></h3>
                        <p class="info-label-value"> {!! link_to('emailto:' . $user->email, $user->email, true) !!}</p>
                    </li>
                    <li>
                        <h3><strong>Telefono:</strong></span></h3>
                        <p class="info-label-value">+39 {{ $user->telefono }}</p>
                    </li>
                    <li>
                        <h3><strong>Ruolo:</strong><span></span></h3>
                        <p class="info-label-value">{{ $user->role }}</p>
                    </li>

                    @can('isTecnico')
                        <li>
                            <h3><strong>Centro assistenza:</strong></h3>
                            @php
                                $centro = $user->belongsTo(CentroAssistenza::class, 'centroID','ID')->first();
                            @endphp
                            <p class="info-label-value">{{ $centro->ragione_sociale  ?? 'Nessun centro'}}</p>
                        </li>
                    @endcan
                </ul>
            </div>

            <div class="col user-account-info">
                <ul>
                    <li class="account-info">
                        <h3>Account creato:</h4>
                        <p class="info-label-value">{{ $user->created_at->format('d/m/Y') }} alle {{ $user->created_at->format('H:i') }}</p>
                    </li>
                    <li class="account-info">
                        <h3>Modificato:</h4>
                        <p class="info-label-value">{{ $user->created_at->format('d/m/Y') ?? "Non disponibile"}} alle {{ $user->created_at->format('H:i') ?? "Non disponibile"}}<p>
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
