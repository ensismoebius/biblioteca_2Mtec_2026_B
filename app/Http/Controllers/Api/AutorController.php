<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AutorResource;
use App\Models\Autor;

/**
 * Controller responsável por gerenciar os endpoints de Autores na API.
 */
class AutorController extends Controller
{
    /**
     * Lista todos os autores com paginação de 10 registros.
     */
    public function index()
    {
        return AutorResource::collection(Autor::paginate(10));
    }

    /**
     * Exibe os detalhes de um autor específico através do ID.
     */
    public function show($id)
    {
        $autor = Autor::findOrFail($id);

        return new AutorResource($autor);
    }
}
