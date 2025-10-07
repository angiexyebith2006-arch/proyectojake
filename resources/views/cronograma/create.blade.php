<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Cumpleaños') }}
        </h2>
    </x-slot>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminApp - Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Botón Volver -->
                    <div class="mb-4">
                        <a href="{{ route('cronograma.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver al Listado
                        </a>
                    </div>

                    <!-- Formulario de Creación -->
                    <form action="{{ route('cronograma.store') }}" method="POST" class="space-y-6" novalidate>
                        @csrf

                        <!-- Card del Formulario -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-lg font-semibold">Información del Cumpleaños</h3>
                            </div>
                            <div class="card-body p-6">

                                @if (session('error'))
                                    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <!-- Nombre -->
                                <div class="mb-4">
                                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre *</label>
                                    <input type="text" 
                                           name="nombre" 
                                           id="nombre"
                                           value="{{ old('nombre') }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('nombre') border-red-500 bg-red-50 @enderror"
                                           placeholder="Ej: Juan Pérez García">
                                    @error('nombre')
                                        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Fecha Nacimiento -->
                                <div class="mb-4">
                                    <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento *</label>
                                    <input type="date" 
                                           name="fecha_nacimiento" 
                                           id="fecha_nacimiento"
                                           value="{{ old('fecha_nacimiento') }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('fecha_nacimiento') border-red-500 bg-red-50 @enderror">
                                    @error('fecha_nacimiento')
                                        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Código Usuario -->
                                <div class="mb-4">
                                    <label for="codigo_usuario" class="block text-sm font-medium text-gray-700">Código de Usuario *</label>
                                    <input type="number" 
                                           name="codigo_usuario" 
                                           id="codigo_usuario"
                                           value="{{ old('codigo_usuario') }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('codigo_usuario') border-red-500 bg-red-50 @enderror"
                                           placeholder="Ej: 12345">
                                    @error('codigo_usuario')
                                        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('cronograma.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar Cumpleaños
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

        input.border-red-500, textarea.border-red-500 {
            border-color: var(--danger);
            background-color: #fef2f2;
        }

        .bg-red-50 {
            background-color: #fef2f2;
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