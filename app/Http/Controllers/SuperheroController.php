<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
    public function index()
    {
        $superheroes = Superhero::all();
        return view('superheroes.index', compact('superheroes'));
    }

    public function create()
    {
        return view('superheroes.create');
    }

    public function store(Request $request)
    {
         dd($request->all()); // mostrar datos antes de guardarlkos
        $validatedData = $request->validate([
            'real_name' => 'required|string|max:255',
            'hero_name' => 'required|string|max:255',
            'photo_url' => 'required|url',
            'additional_info' => 'nullable|string',
        ]);
    
        /*Superhero::create([
            'real_name' => $request->real_name,
            'hero_name' => $request->hero_name,
            'photo_url' => $request->photo_url,
            'additional_info' => $request->additional_info,
        ]); */
        Superhero::create($validatedData);
        
    
        return redirect()->route('superheroes.index')->with('success', 'Superhéroe creado.');
        
    }

    public function show(Superhero $superhero)
    {
        return view('superheroes.show', compact('superhero'));
    }

    public function edit(Superhero $superhero)
    {
        return view('superheroes.edit', compact('superhero'));
    }

    public function update(Request $request, Superhero $superhero)
    {
        $superhero->update($request->validate([
            'real_name' => 'required|string|max:255',
            'hero_name' => 'required|string|max:255',
            'photo_url' => 'required|url',
            'additional_info' => 'nullable|string',
        ]));

        return redirect()->route('superheroes.index')->with('success', 'Superhéroe actualizado.');
    }

    public function destroy(Superhero $superhero)
    {
        $superhero->delete();
        return redirect()->route('superheroes.index')->with('success', 'Superhéroe eliminado.');
    }
}
