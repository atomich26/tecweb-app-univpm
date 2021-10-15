@extends('layouts.admin', ['incHeader' => true, 'incFooter' => true, 'adminView' => true])

@section('page-content')
    <section>
        @yield('content')
    </section>
@endsection