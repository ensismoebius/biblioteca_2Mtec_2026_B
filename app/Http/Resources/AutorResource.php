<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Resource responsável por formatar os dados de saída de um autor.
 */
class AutorResource extends JsonResource
{
    /**
     * Transforma o recurso em um array para o JSON de saída.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->AUTCODIGO,
            'nome' => $this->AUTNOME,
            'pseudonimo' => $this->AUTPSEUDONIMO,
            'biografia' => $this->AUTBIOGRAFIA,
            'pais_origem' => $this->AUTPAISNASC,
        ];
    }
}
