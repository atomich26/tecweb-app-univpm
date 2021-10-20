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

    <!-- Response Message --->
    <meta name="response-message" content="{{ session('message') ?? '' }}" data-alert="{{ session('alert') ?? '' }}"> 

    <title>{{ $title . ' | ' . config('app.name')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/message.js')}}" ></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js')}}" ></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Fonts -->
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <!---- Favicon --->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    @includeWhen($incHeader, 'layouts-parts.header', ['adminView' => $adminView])

    <main id="page-container">
        @yield('page-container')
    </main>

    @includeWhen($incFooter,'layouts-parts.footer')

</body>
    @yield('js-scripts')
</html>
