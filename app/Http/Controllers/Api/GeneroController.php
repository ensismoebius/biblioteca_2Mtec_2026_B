<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneroResource;
use App\Models\Genero;

/**
 * Controller responsável por gerenciar as requisições de gêneros literários na API.
 */
class GeneroController extends Controller
{
    /**
     * Lista todos os gêneros cadastrados com paginação.
     */
    public function index()
    {
        return GeneroResource::collection(Genero::paginate(10));
    }

    /**
     * Exibe os detalhes de um gênero específico.
     */
    public function show($id)
    {
        $genero = Genero::findOrFail($id);

        return new GeneroResource($genero);
    }
}
