<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Editar Cumpleaños
        </h2>
    </x-slot>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminApp - Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="flex justify-center py-6">
        <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-8">

          

            <form action="{{ route('cronograma.update', $cumpleanos) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Nombre -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="nombre" 
                               value="{{ $cumpleanos->nombre }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               required>
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" 
                               value="{{ $cumpleanos->fecha_nacimiento }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               required>
                    </div>

                    <!-- Código Usuario -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Código Usuario</label>
                        <input type="number" name="codigo_usuario" 
                               value="{{ $cumpleanos->codigo_usuario }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                               required>
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


