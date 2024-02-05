@extends('layouts.head')
@section('titolo_pagina')
    Aggiunta Fumetto
@endsection

@section('header_title')
    Aggiungi un fumetto
@endsection

@section('main')

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action={{ route('comics.store') }} method="POST" class="d-flex row">
            @csrf
            <div class="mb-3 col-6">
                <label for="nome" class="form-label">Nome Fumetto</label>
                <input type="text" class="form-control" id="nome" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3 col-6">
                <label for="serie" class="form-label">Serie Fumetto</label>
                <input type="text" class="form-control" id="serie" name="series" value="{{ old('series') }}">
            </div>
            <div class="mb-3 col-3">
                <label for="tipo" class="form-label">Tipo Fumetto</label>
                <input type="text" class="form-control" id="tipo" name="type" value="{{ old('type') }}">
            </div>
            <div class="mb-3 col-9">
                <label for="link" class="form-label">Link Copertina</label>
                <input type="text" class="form-control" id="link" name="thumb" value="{{ old('thumb') }}">
            </div>
            <div class="mb-3 col-4">
                <label for="prezzo" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="prezzo" name="price" value="{{ old('price') }}">
            </div>
            <div class="mb-3 col-4">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="sale_date" value="{{ old('sale_date') }}">
            </div>
            <div class="mb-3">
                <label for="descrizione" class="form-label">Descrizione fumetto</label>
                <textarea name="description" id="descrizione" cols="30" rows="5" class="form-control">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </form>
    </div>
@endsection
