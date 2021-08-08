@extends('layouts.public')

@section('page-content')
<h1>Homepage</h1>

@auth
<p>{{ Auth::user()->nome }}</p>
@endauth

@endsection