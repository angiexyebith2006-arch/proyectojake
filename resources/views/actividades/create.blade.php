<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nueva Actividad') }}
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Botón Volver -->
                    <div class="mb-4">
                        <a href="{{ route('actividades.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver al Listado
                        </a>
                    </div>

                    <!-- Formulario de Creación -->
<form action="{{ route('actividades.store') }}" method="POST" class="space-y-6" novalidate>
    @csrf

    <!-- Motivo -->
    <div class="mb-4">
        <label for="motivo" class="block text-sm font-medium text-gray-700">Motivo *</label>
        <input type="text" 
               name="motivo" 
               id="motivo"
               value="{{ old('motivo') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('motivo') border-red-500 bg-red-50 @enderror"
               placeholder="Ej: Culto de adoración dominical">
        @error('motivo')
            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <!-- Lugar -->
    <div class="mb-4">
        <label for="lugar" class="block text-sm font-medium text-gray-700">Lugar *</label>
        <input type="text" 
               name="lugar" 
               id="lugar"
               value="{{ old('lugar') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('lugar') border-red-500 bg-red-50 @enderror"
               placeholder="Ej: Santuario principal">
        @error('lugar')
            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <!-- Responsable -->
    <div class="mb-4">
        <label for="responsable" class="block text-sm font-medium text-gray-700">Responsable *</label>
        <input type="text" 
               name="responsable" 
               id="responsable"
               value="{{ old('responsable') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('responsable') border-red-500 bg-red-50 @enderror"
               placeholder="Ej: Pastor Juan Martínez">
        @error('responsable')
            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <!-- Fecha -->
    <div class="mb-4">
        <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha *</label>
        <input type="date" 
               name="fecha" 
               id="fecha"
               value="{{ old('fecha') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('fecha') border-red-500 bg-red-50 @enderror">
        @error('fecha')
            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <!-- Hora -->
    <div class="mb-4">
        <label for="hora" class="block text-sm font-medium text-gray-700">Hora *</label>
        <input type="time" 
               name="hora" 
               id="hora"
               value="{{ old('hora') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('hora') border-red-500 bg-red-50 @enderror">
        @error('hora')
            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <!-- Mensaje -->
    <div class="mb-4">
        <label for="mensaje" class="block text-sm font-medium text-gray-700">Mensaje o Observaciones</label>
        <textarea name="mensaje" 
                  id="mensaje" 
                  rows="4"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('mensaje') border-red-500 bg-red-50 @enderror"
                  placeholder="Ej: Traer Biblias y corazones dispuestos para alabar a Dios">{{ old('mensaje') }}</textarea>
        @error('mensaje')
            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <!-- Botones de Acción -->
    <div class="flex justify-end space-x-4">
        <a href="{{ route('actividades.index') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Crear Actividad
        </button>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary: #05559D;
            --secondary: #6c757d;
            --success: #28a745;
            --danger: #dc3545;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: #044480;
            color: white;
        }

        .btn-secondary {
            background-color: var(--secondary);
            color: white;
        }

        .btn-secondary:hover {
            background-color: #545b62;
            color: white;
        }

        .card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .card-header {
            background-color: #f8f9fa;
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            font-weight: 600;
        }

        .card-body {
            padding: 20px;
        }

        input, textarea {
            border: 1px solid #d1d5db;
            padding: 10px 12px;
            width: 100%;
            border-radius: 6px;
            transition: border-color 0.3s;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(5, 85, 157, 0.1);
        }

        label {
            font-weight: 500;
            margin-bottom: 4px;
            display: block;
        }

        .text-red-500 {
            color: var(--danger);
        }

        .space-y-6 > * + * {
            margin-top: 24px;
        }

        .mb-4 {
            margin-bottom: 16px;
        }

        .flex {
            display: flex;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .space-x-4 > * + * {
            margin-left: 16px;
        }
    </style>

    <!-- Incluir Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</x-app-layout>