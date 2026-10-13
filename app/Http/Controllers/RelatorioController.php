<?php

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

/**
 * Controller responsável por gerar relatórios em PDF.
 */
class RelatorioController extends Controller
{
    /**
     * Gera um relatório em PDF dos empréstimos que estão atrasados.
     */
    public function atrasospdf()
    {
        /**
         * Consulta os empréstimos que estão atrasados (não devolvidos e com data de empréstimo maior que 7 dias atrás)
         */
        $atrasos = DB::table('EMPRESTIMOS')
            ->join('LIVROS', 'EMPRESTIMOS.EMPLIVRO', '=', 'LIVROS.LVRCODIGO')
            ->join('CLIENTES', 'EMPRESTIMOS.EMPCLIENTE', '=', 'CLIENTES.CLICODIGO')
            ->select('EMPRESTIMOS.*', 'LIVROS.LVRNOME', 'CLIENTES.CLINOME')
            ->whereNull('EMPRESTIMOS.EMPDTDEVOL')
            ->whereDate('EMPRESTIMOS.EMPDTEMPR', '<', now()->subDays(7))
            ->orderBy('EMPRESTIMOS.EMPDTEMPR')
            ->get();

        $pdf = Pdf::loadView('relatorios.atrasos', ['atrasos' => $atrasos]);

        return $pdf->download('relatorio_atrasos.pdf');
    }

    /**
     * Gera um relatório em PDF dos 10 livros mais emprestados.
     */
    public function maisEmprestadosPdf()
    {
        /**
         * Consulta os 10 livros mais emprestados, ordenados pelo número de empréstimos e pelo nome do livro.
         */
        $maisEmprestados = DB::table('EMPRESTIMOS')
            ->join('LIVROS', 'EMPRESTIMOS.EMPLIVRO', '=', 'LIVROS.LVRCODIGO')
            ->select('LIVROS.LVRNOME', DB::raw('COUNT(EMPRESTIMOS.EMPCODIGO) as total_emprestimos'))
            ->groupBy('LIVROS.LVRCODIGO', 'LIVROS.LVRNOME')
            ->orderByDesc('total_emprestimos')
            ->orderBy('LIVROS.LVRNOME', 'asc')
            ->limit(10)
            ->get();

        $pdf = Pdf::loadView('relatorios.mais-emprestados-pdf', ['maisEmprestados' => $maisEmprestados]);

        return $pdf->download('relatorio_mais_emprestados.pdf');
    }
}
