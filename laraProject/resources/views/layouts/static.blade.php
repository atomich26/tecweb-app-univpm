@extends('layouts.public')

@section('content')

    @include('helpers.static-page-header', ['imgCover' => $pageCover])
    
    <div class="static-content">
    
        @yield('static-content')
    
    </div>

@endsection