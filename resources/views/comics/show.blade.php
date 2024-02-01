@extends('layouts.head')
@section('titolo_pagina')
    Comic details
@endsection

@section('header_title')
    Details
@endsection

@section('main')
    <div class="container">
        <h3>Descrizione:</h3>
        <p>{{ $comic->description }}</p>
        <a href={{ route('comics.index') }} class="btn btn-primary">Ritorna alla Home</a>
    </div>
@endsection
