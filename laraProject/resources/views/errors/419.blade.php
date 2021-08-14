@extends('layouts.public', ['title' => 'Errore 419'])

@section('content')
<div class="container flex-v-center">
        <div class="http-error">
            <h1 class="error-code">Errore 419<h1>
            <h2>Sessione scaduta. Effettua il login per accedere alla pagina richiesta.</h2>
        </div>
    </div>
@endsection