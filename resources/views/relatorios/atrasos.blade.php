@php
    $prazoDias = 7;
@endphp
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de atrasos</title>
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
        'titulo' => 'Relatório de Empréstimos em Atraso',
        'filtros' => "Empréstimos sem devolução há mais de {$prazoDias} dias",
    ])

    <table class="dados">
        <thead>
            <tr>
                <th>Livro</th>
                <th>Cliente</th>
                <th class="centro">Data do empréstimo</th>
                <th class="centro">Dias de atraso</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($atrasos as $atraso)
                @php
                    $dataEmprestimo = \Carbon\Carbon::parse($atraso->EMPDTEMPR);
                    $diasAtraso = (int) $dataEmprestimo->diffInDays(now()) - $prazoDias;
                @endphp
                <tr>
                    <td>{{ $atraso->LVRNOME }}</td>
                    <td>{{ $atraso->CLINOME }}</td>
                    <td class="centro">{{ $dataEmprestimo->format('d/m/Y') }}</td>
                    <td class="centro">{{ $diasAtraso }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="centro">Nenhum empréstimo em atraso.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
