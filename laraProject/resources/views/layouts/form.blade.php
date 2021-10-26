@extends('layouts.admin', ['incHeader' => true, 'incFooter' => false, 'adminView' => true])

@section('content')
    <div class="form-title">
        <h2> {{ $title }}</h2>
    </div>
    @yield('form')
@endsection
