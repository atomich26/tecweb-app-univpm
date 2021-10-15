@extends('layouts.root', ['incHeader' => true, 'incFooter' => true, 'adminView' => false])

@section('page-container')

<section id="content">
    <div class="container" style="padding-top:20px">
    @if($headerPage)    
        @php
        if($imgCover == null) 
            $imgCover = "default_cover.jpg"
        @endphp

        <div class="page-header">
            <img src=" {{ asset('storage/images/covers/' . $imgCover)}}" class="page-cover-header">
            <div class="page-header-content">
                <h1 class="page-title">{{ $title }}</h1>
                    <h4>{{ $description }}</h4>
            </div>
        </div>
    @endif
    </div>
    @yield('content')
</section>

@endsection
