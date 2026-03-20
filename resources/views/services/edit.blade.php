<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Servicio: {{ $service->name }}</h2>
            
            <form action="{{ route('services.update', $service) }}" method="POST">
                @csrf
                @method('PUT') {{-- Importante: Laravel necesita PUT para actualizaciones --}}

                <div class="mb-4">
                    <label class="block font-bold mb-2 text-gray-700">Nombre del Servicio</label>
                    <input type="text" name="name" value="{{ old('name', $service->name) }}" 
                           class="w-full rounded border-gray-300 focus:border-pink-500 focus:ring-pink-500" required>
                </div>

                <div class="mb-4">
                    <label class="block font-bold mb-2 text-gray-700">Duración (minutos)</label>
                    <input type="number" name="duration_minutes" value="{{ old('duration_minutes', $service->duration_minutes) }}" 
                           class="w-full rounded border-gray-300 focus:border-pink-500 focus:ring-pink-500" required>
                </div>

                <div class="mb-6">
                    <label class="block font-bold mb-2 text-gray-700">Precio (Lempiras)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $service->price) }}" 
                           class="w-full rounded border-gray-300 focus:border-pink-500 focus:ring-pink-500" required>
                </div>

                <div class="flex justify-end gap-4 border-t pt-6">
                    <a href="{{ route('services.index') }}" class="px-4 py-2 border rounded text-gray-600 hover:bg-gray-50 transition">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700 shadow transition">
                        Actualizar Servicio
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>