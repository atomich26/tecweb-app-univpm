@extends('layouts.public', ['title' => 'Errore 500'])

@section('content')
<div class=" container flex-v-center">
        <div class="http-error">
            <h1 class="error-code">Errore 500<h1>
            <h2>Errore interno al server. Contatta l'amministratore del sito all'indirizzo support@admin.electrohm.com</h2>
        </div>
    </div>
@endsection