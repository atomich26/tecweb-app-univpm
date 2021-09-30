@extends('layouts.root', ['incHeader' => true, 'incFooter' => false, 'adminView' => true])

@section('page-container')

<section id="content">
    @yield('content')
</section>

@endsection