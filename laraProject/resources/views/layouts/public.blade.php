@extends('layouts.root', ['incHeader' => true, 'incFooter' => true, 'adminView' => false])

@section('page-container')

<section id="content">
    @yield('content')
</section>

@endsection
