<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ComicsController extends Controller
{
    private function validator($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:100',
            'description' => 'min:20|nullable',
            'thumb' => 'image|nullable',
            'price' => 'required|integer',
            'series' => 'required|min:5',
            'type' => ['required', Rule::in(['comic book', 'graphic novel']),],
            'sale_date' => 'date|nullable'
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo deve essere al massimo di 30 caratteri',
            'description.min' => 'La descrizione è troppo corta. Min. 20 caratteri',
            'thumb' => 'l\'immagine deve essere di un tipo valido',
            'price.required' => 'Inserire un prezzo',
            'price.integer' => 'Il prezzo deve essere un numero',
            'series.required' => 'Inserire la serie',
            'series.min' => 'La serie deve essere più lunga',
            'type.required' => 'Inserire il tipo',
            'sale_date.required' => 'Inserire una data valida',

        ])->validate();

        return $validator;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validator($request->all());
        $comic = new Comic();

        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $this->validator($request->all());
        $comic->update($data);
        return redirect()->route('comics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
