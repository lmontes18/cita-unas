<x-app-layout>
    <div class="py-6 md:py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-black text-gray-900 italic">Bitácora de Gastos</h2>
                    <p class="text-sm text-gray-500 font-medium">Historial detallado de egresos del negocio</p>
                </div>
                <a href="{{ route('dashboard') }}"
                    class="bg-white border border-gray-200 text-gray-700 px-4 py-2 rounded-xl text-sm font-bold shadow-sm hover:bg-gray-50 transition">
                    Volver al Dash
                </a>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="px-6 py-4 text-[10px] uppercase font-black text-gray-400 tracking-widest">
                                    Fecha Gasto</th>
                                <th class="px-6 py-4 text-[10px] uppercase font-black text-gray-400 tracking-widest">
                                    Descripción</th>
                                <th class="px-6 py-4 text-[10px] uppercase font-black text-gray-400 tracking-widest">
                                    Registrado el</th>
                                <th
                                    class="px-6 py-4 text-[10px] uppercase font-black text-gray-400 tracking-widest text-right">
                                    Monto</th>
                                <th
                                    class="px-6 py-4 text-[10px] uppercase font-black text-gray-400 tracking-widest text-right">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($expenses as $expense)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-block px-3 py-1 bg-red-50 text-red-600 rounded-lg font-bold text-xs">
                                            {{ \Carbon\Carbon::parse($expense->date)->format('d/m/Y') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-bold text-gray-800">
                                        {{ $expense->description }}
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-400 font-medium">
                                        {{ $expense->created_at->format('d/m/Y h:i A') }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <span class="text-sm font-black text-gray-900">
                                            L. {{ number_format($expense->amount, 2) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <form action="{{ route('expenses.destroy', $expense) }}" method="POST"
                                            onsubmit="return confirm('¿Estás segura de eliminar este gasto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition active:scale-90">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-gray-200 mb-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 012-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                                </path>
                                            </svg>
                                            <p class="text-gray-400 font-medium italic">No se han registrado gastos todavía.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($expenses->hasPages())
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        {{ $expenses->links() }}
                    </div>
                @endif
            </div>

            <div class="mt-6 flex justify-end">
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 inline-flex items-center gap-3">
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-tighter">Total en esta
                        página:</span>
                    <span class="text-lg font-black text-red-600">L.
                        {{ number_format($expenses->sum('amount'), 2) }}</span>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>