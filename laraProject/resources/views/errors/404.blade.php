@extends('layouts.public', ['title' => 'Errore 404'])

@section('content')
    <div class="container flex-v-center http-error-page">
        <div class="http-error">
            <h1 class="error-code">Errore 404<h1>
            <h2>Pagina non trovata. Assicurati di aver digitato correttamente l'indirizzo url.</h2>
        </div>
    </div>
@endsection