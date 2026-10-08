<table width="100%" cellspacing="0" cellpadding="5" style="margin-bottom: 15px;">
    <tr>
        <td width="20%">
            @if (file_exists(public_path('images/logo.png')))
                <img src="{{ public_path('images/logo.png') }}" height="50">
            @endif
        </td>
        <td>
            <h1 style="margin: 0; font-size: 18px;">{{ $titulo }}</h1>
            <div>Gerado em {{ now()->format('d/m/Y H:i') }}</div>
            <div>Filtros: {{ $filtros }}</div>
        </td>
    </tr>
</table>
