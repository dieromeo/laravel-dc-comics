<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComicsController extends Controller
{
    public function validator(Request $request)
    {
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
        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'min:20|nullable',
            'thumb' => 'image|nullable',
            'price' => 'required|integer',
            'series' => 'required|min:5',
            'type' => ['required', Rule::in(['comic book', 'graphic novel']),],
            'sale_date' => 'date|nullable'
        ]);

        $comic = new Comic();
        $comic->title = $validated['title'];
        $comic->description = $validated['description'];
        $comic->thumb = $validated['thumb'];
        $comic->price = $validated['price'];
        $comic->series = $validated['series'];
        $comic->sale_date = $validated['sale_date'];
        $comic->type = $validated['type'];
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

        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'min:20|nullable',
            'thumb' => 'image|nullable',
            'price' => 'required|integer',
            'series' => 'required|min:5',
            'type' => ['required', Rule::in(['comic book', 'graphic novel']),],
            'sale_date' => 'date|nullable'
        ]);

        $comic->update($validated);
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
