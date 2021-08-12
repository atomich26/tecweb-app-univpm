<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portale per il supporto post vendita dei prodotti Electrohm">
    <meta name="keywords" content="electrohm, helpdesk, elettrodomestici, supporto, lavatrici, frigoriferi, assistenza tecnica">
    <meta name="author" content="Diego Giacchi, Michele Bevilacqua">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') . ' | ' . $pageTitle }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    @include('layouts.layouts-parts.header')

    <main id="page-content">
        @yield('page-content')
    </main>

    @include('layouts.layouts-parts.footer')

</body>
    @yield('js-scripts')
</html>
