@extends('layouts.head')
@section('titolo_pagina')
    Edit Comic
@endsection

@section('header_title')
    Modifica il fumetto
@endsection

@section('main')
    <div class="container bg-dark p-4 rounded">
        <form action={{ route('comics.update', $comic->id) }} method="POST" class="d-flex row text-light">
            @csrf
            @method('PUT')
            <div class="mb-3 col-6">
                <label for="nome" class="form-label">Nome Fumetto</label>
                <input type="text" class="form-control" id="nome" name="title" value="{{ $comic->title }}">
            </div>
            <div class="mb-3 col-6">
                <label for="serie" class="form-label">Serie Fumetto</label>
                <input type="text" class="form-control" id="serie" name="series" value="{{ $comic->series }}">
            </div>
            <div class="mb-3 col-3">
                <label for="tipo" class="form-label">Tipo Fumetto</label>
                <input type="text" class="form-control" id="tipo" name="type" value="{{ $comic->type }}">
            </div>
            <div class="mb-3 col-9">
                <label for="link" class="form-label">Link Copertina</label>
                <input type="text" class="form-control" id="link" name="thumb" value="{{ $comic->thumb }}">
            </div>
            <div class="mb-3 col-4">
                <label for="prezzo" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="prezzo" name="price" value="{{ $comic->price }}">
            </div>
            <div class="mb-3 col-4">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="sale_date" value="{{ $comic->sale_date }}">
            </div>
            <div class="mb-3">
                <label for="descrizione" class="form-label">Descrizione fumetto</label>
                <textarea name="description" id="descrizione" cols="30" rows="5" class="form-control">{{ $comic->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </form>
    </div>
@endsection
