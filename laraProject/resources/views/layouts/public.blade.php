@extends('layouts.root', ['pageTitle' => $title, 'incHeader' => true, 'incFooter' => true])

@section('page-container')

<section id="content">
    @yield('content')
</section>

@endsection