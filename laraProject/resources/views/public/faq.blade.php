@extends('layouts.public', ['title' => 'FAQ'])

@section('content')
    <h1>Faq page</h1>
    @if(session('message'))
        <h4 class="alert-message {{ session('alertType') ?? '' }}">{{ __(session('message')) ?? '' }}</h4>
    @endif
@endsection
