@extends('layouts.public', 'incHeader' => true, 'incFooter' => true, 'adminView' => false)

@section('content')

    @include('helpers.static-page-header', ['imgCover' => $pageCover])

    <div class="static-content container">

        @yield('static-content')

    </div>

@endsection
