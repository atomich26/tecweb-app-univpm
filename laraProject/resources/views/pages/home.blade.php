@extends('layouts.public')

@section('page-content')
<h1>Homepage</h1>

@guest 
    <p>Non autenticato</p>
@endguest

@auth
<p>{{ Auth::user()->username }}</p>
@endauth

@endsection