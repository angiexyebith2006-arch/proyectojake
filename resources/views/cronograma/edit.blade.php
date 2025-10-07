<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Editar Cumpleaños
        </h2>
    </x-slot>

    <div class="flex justify-center py-6">
        <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-8">

            {{-- ⚠️ Mostrar errores globales de validación --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                    <strong>Por favor corrige los siguientes errores:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cronograma.update', $cumpleanos) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Nombre -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="nombre"
                            value="{{ old('nombre', $cumpleanos->nombre) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('nombre') border-red-500 @enderror">

                        <!-- ⚠️ Error individual -->
                        @error('nombre')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha Nacimiento</label>
                        <input type="date" name="fecha_nacimiento"
                            value="{{ old('fecha_nacimiento', $cumpleanos->fecha_nacimiento) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('fecha_nacimiento') border-red-500 @enderror">

                        @error('fecha_nacimiento')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Código Usuario -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Código Usuario</label>
                        <input type="number" name="codigo_usuario"
                            value="{{ old('codigo_usuario', $cumpleanos->codigo_usuario) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('codigo_usuario') border-red-500 @enderror">

                        @error('codigo_usuario')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botón -->
                <div class="mt-6 text-center">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>




