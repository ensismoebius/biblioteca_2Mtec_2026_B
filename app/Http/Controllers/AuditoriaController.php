<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\View\View;

/**
 * Exibe a tela de auditoria de alterações.
 */
class AuditoriaController extends Controller
{
    /**
     * Lista o histórico de auditoria, do mais recente para o mais antigo.
     */
    public function index(): View
    {
        $registros = Auditoria::with('usuario')
            ->orderByDesc('AUDCODIGO')
            ->paginate(20);

        return view('auditoria.index', ['registros' => $registros]);
    }
}
