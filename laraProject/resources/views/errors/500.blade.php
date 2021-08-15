@extends('layouts.public', ['title' => 'Errore 500'])

@section('content')
<div class="container flex-v-center http-error-page">
        <div class="http-error">
            <h1 class="error-code">Errore 500<h1>
            <h2>Errore interno al server. Contatta l'amministratore del sito all'indirizzo supporto@admin.electrohm.com</h2>
        </div>
    </div>
@endsection