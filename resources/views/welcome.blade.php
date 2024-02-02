@extends('layouts.head')
@section('titolo_pagina')
    Welcome
@endsection

@section('main')
    <div class="container text-center">
        <a href={{ route('comics.index') }} class="btn btn-primary">Visualizza i fumetti</a>
    </div>
@endsection
