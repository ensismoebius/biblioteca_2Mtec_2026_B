<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Resource para formatar o retorno dos dados de Livros na API.
 */
class LivroResource extends JsonResource
{
    /**
     * Transforma o recurso de livro em um array JSON estruturado.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->LVRCODIGO,
            'titulo' => $this->LVRTITULO,
            // Embutir o relacionamento com o autor caso ele seja carregado
            'autor' => $this->whenLoaded('autor'),
        ];
    }
}
