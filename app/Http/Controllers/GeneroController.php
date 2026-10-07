<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

/**
 * Controlador responsável pelo gerenciamento de gêneros.
 */
class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Genero::orderBy('GNRNOME')->paginate(15);

        return view('generos.index', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Genero::create([
            'GNRNOME' => $request->input('GNRNOME'),
        ]);

        return redirect()
            ->route('generos.index')
            ->with('success', 'Gênero cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genero $genero)
    {
        return view('generos.show', compact('genero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genero $genero)
    {
        return view('generos.edit', compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genero $genero)
    {
        $genero->update([
            'GNRNOME' => $request->input('GNRNOME'),
        ]);

        return redirect()
            ->route('generos.index')
            ->with('success', 'Gênero atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();

        return redirect()
            ->route('generos.index')
            ->with('success', 'Gênero excluído com sucesso.');
    }
}
