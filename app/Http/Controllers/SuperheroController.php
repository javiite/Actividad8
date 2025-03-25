<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
    public function index()
    {
        $superheroes = Superhero::whereNull('deleted_at')->get();
        return view('superheroes.index', compact('superheroes'));
    }

    public function create()
    {
        return view('superheroes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'real_name' => 'required|string|max:255',
            'hero_name' => 'required|string|max:255',
            'photo' => 'nullable|image',
            'additional_info' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_url'] = $request->file('photo')->store('superheroes', 'public');
        }

        Superhero::create($data);

        return redirect()->route('superheroes.index')->with('success', 'Superhéroe creado correctamente.');
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
        $data = $request->validate([
            'real_name' => 'required|string|max:255',
            'hero_name' => 'required|string|max:255',
            'photo' => 'nullable|image',
            'additional_info' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_url'] = $request->file('photo')->store('superheroes', 'public');
        }

        $superhero->update($data);

        return redirect()->route('superheroes.index')->with('success', 'Superhéroe actualizado correctamente.');
    }

    public function destroy(Superhero $superhero)
    {
        $superhero->delete();
        return redirect()->route('superheroes.index')->with('success', 'Superhéroe eliminado (borrado lógico).');
    }

    // 👇 MÉTODOS PARA GESTIONAR REGISTROS ELIMINADOS

    public function trash()
    {
       // $superheroes = Superhero::all();
        //return view('superheroes.create');
        //return view('superheroes.trash');
        $superheroes = Superhero::onlyTrashed()->get();
        return view('superheroes.trash', compact('superheroes'));
    }

    public function restore($id)
    {
        $superhero = Superhero::onlyTrashed()->findOrFail($id);
        $superhero->restore();

        return redirect()->route('superheroes.index')->with('success', 'Superhéroe restaurado.');
    }

    public function forceDelete($id)
    {
        $superhero = Superhero::onlyTrashed()->findOrFail($id);
        $superhero->forceDelete();

        return redirect()->route('superheroes.trash')->with('success', 'Superhéroe eliminado permanentemente.');
    }
}
