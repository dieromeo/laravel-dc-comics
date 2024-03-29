@extends('layouts.head')
@section('titolo_pagina')
    Comics Home
@endsection

@section('header_title')
    Lista fumetti
@endsection

@section('main')
    <div class="container">
        <div class="row list-unstyled g-4">
            @foreach ($comics as $comic)
                <div class="col-3 ">
                    <div class="card d-flex h-100">
                        <div class="img d-flex justify-content-center">
                            <img src={{ $comic->thumb }} class="img-fluid" alt={{ $comic->title }}>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->title }}</h5>
                            <ul class="list-group m-3">
                                <li class="list-group-item">Prezzo: {{ $comic->price }}$</li>
                                <li class="list-group-item">Serie: {{ $comic->series }}</li>
                                <li class="list-group-item">Categoria: {{ $comic->type }}</li>
                            </ul>
                            <div class="text-center">
                                <a href={{ route('comics.show', $comic->id) }} class="btn btn-primary">Vedi descrizione</a>
                                <a href={{ route('comics.edit', $comic->id) }} class="btn btn-warning">Modifica</a>
                            </div>
                            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST"
                                class="text-center pt-2">
                                @csrf
                                @method('DELETE')

                                <input type="submit" class="btn btn-danger" value="Elimina" id="delete">
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href={{ route('comics.create') }} class="btn btn-success p-3 my-4 d-block">Aggiungi un Fumetto</a>
    </div>
@endsection
