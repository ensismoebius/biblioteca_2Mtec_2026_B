<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Livros mais emprestados</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #222; }
        table.dados { width: 100%; border-collapse: collapse; }
        table.dados th, table.dados td { border: 1px solid #ccc; padding: 6px 8px; text-align: left; }
        table.dados th { background: #eee; }
        .centro { text-align: center; }
    </style>
</head>
<body>
    @include('relatorios._cabecalho', [
        'titulo' => 'Relatório de Livros Mais Emprestados',
        'filtros' => 'Top 10 livros mais emprestados',
    ])

    <table class="dados">
        <thead>
            <tr>
                <th class="centro" width="8%">#</th>
                <th>Livro</th>
                <th class="centro" width="25%">Quantidade de Empréstimos</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($maisEmprestados as $i => $livro)
                <tr>
                    <td class="centro">{{ $i + 1 }}</td>
                    <td>{{ $livro->LVRNOME }}</td>
                    <td class="centro">{{ $livro->total_emprestimos }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="centro">Nenhum empréstimo registrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
