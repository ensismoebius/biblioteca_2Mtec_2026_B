<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Auditoria de alterações
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg p-6 text-gray-900">
                <table class="min-w-full text-sm text-left">
                    <thead class="border-b font-semibold">
                        <tr>
                            <th class="py-2 pe-4">Data</th>
                            <th class="py-2 pe-4">Usuário</th>
                            <th class="py-2 pe-4">Ação</th>
                            <th class="py-2 pe-4">Tabela / Registro</th>
                            <th class="py-2">O que mudou</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($registros as $registro)
                            <tr class="border-b align-top">
                                <td class="py-2 pe-4">{{ $registro->AUDDATA->format('d/m/Y H:i') }}</td>
                                <td class="py-2 pe-4">{{ $registro->usuario?->name ?? 'Sistema' }}</td>
                                <td class="py-2 pe-4">{{ $registro->AUDACAO }}</td>
                                <td class="py-2 pe-4">{{ $registro->AUDTABELA }} #{{ $registro->AUDREGISTRO }}</td>
                                <td class="py-2">
                                    @foreach ($registro->detalhes() as $linha)
                                        <div>{{ $linha }}</div>
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 text-gray-500">Nenhuma alteração registrada ainda.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">{{ $registros->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
