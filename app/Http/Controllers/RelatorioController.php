<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

/**
 * Gera relatorios da biblioteca em formato PDF.
 */
class RelatorioController extends Controller
{
    /**
     * Gera o PDF dos emprestimos em atraso ha mais de sete dias.
     */
    public function atrasospdf()
    {
        $atrasos = DB::table('EMPRESTIMOS')
            ->join('LIVROS', 'EMPRESTIMOS.EMPLIVRO', '=', 'LIVROS.LVRCODIGO')
            ->join('CLIENTES', 'EMPRESTIMOS.EMPCLIENTE', '=', 'CLIENTES.CLICODIGO')
            ->select('EMPRESTIMOS.*', 'LIVROS.LVRTITULO as LVRNOME', 'CLIENTES.CLINOME')
            ->whereNull('EMPRESTIMOS.EMPDTDEVOL')
            ->whereDate('EMPRESTIMOS.EMPDTEMPR', '<', now()->subDays(7))
            ->orderBy('EMPRESTIMOS.EMPDTEMPR')
            ->get();

        $pdf = Pdf::loadView('relatorios.atrasos', ['atrasos' => $atrasos]);

        return $pdf->download('relatorio_atrasos.pdf');
    }

    /**
     * Gera o PDF dos dez livros com mais emprestimos registrados.
     */
    public function maisEmprestadosPdf()
    {
        $maisEmprestados = DB::table('EMPRESTIMOS')
            ->join('LIVROS', 'EMPRESTIMOS.EMPLIVRO', '=', 'LIVROS.LVRCODIGO')
            ->select('LIVROS.LVRTITULO as LVRNOME', DB::raw('COUNT(EMPRESTIMOS.EMPCODIGO) as total_emprestimos'))
            ->groupBy('LIVROS.LVRCODIGO', 'LIVROS.LVRTITULO')
            ->orderByDesc('total_emprestimos')
            ->orderBy('LIVROS.LVRTITULO', 'asc')
            ->limit(10)
            ->get();

        $pdf = Pdf::loadView('relatorios.mais-emprestados-pdf', ['maisEmprestados' => $maisEmprestados]);

        return $pdf->download('relatorio_mais_emprestados.pdf');
    }
}
