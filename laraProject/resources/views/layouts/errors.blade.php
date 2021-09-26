@extends('layouts.root', ['incHeader' => true, 'incFooter' => true, 'adminView' => false])

@section('page-container')
<div class="container flex-v-center http-error-page">
        <div class="http-error">
            <h1 class="error-code">{{ $title }}<h1>
            @yield('error-content')
        </div>
    </div>
@endsection