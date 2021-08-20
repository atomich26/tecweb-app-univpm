@extends('layouts.public', ['title' => Auth::user()->nome . Auth::user()->cognome ])

@section('content') 
    <h1>Ciao {{ Auth::user()->nome ?? "" }} {{Auth::user()->cognome ?? ""}} </h1>
@endsection