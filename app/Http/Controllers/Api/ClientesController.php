<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientesResource;
use App\Models\Clientes;

/**
 * Controller responsável por gerenciar as requisições de clientes na API.
 */
class ClientesController extends Controller
{
    /**
     * Lista todos os clientes cadastrados com paginação.
     */
    public function index()
    {
        return ClientesResource::collection(Clientes::paginate(10));
    }

    /**
     * Exibe os detalhes de um cliente específico.
     */
    public function show($id)
    {
        $cliente = Clientes::findOrFail($id);

        return new ClientesResource($cliente);
    }
}
