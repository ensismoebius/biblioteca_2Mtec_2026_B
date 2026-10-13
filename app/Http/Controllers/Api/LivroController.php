<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Livro;

class LivroController extends Controller
{
    public function index()
    {

        return LivroResource::collection(Livro::with('autor')->get());

    }

    public function show($id)
    {
        $livro = Livro::with('autor')->find($id);

        if (! $livro) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }

        return response()->json($livro, 200);
    }
}
