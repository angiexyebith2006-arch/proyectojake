<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Visita') }}
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
                    <div class="mb-6">
                        <a href="{{ route('seguimiento.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i> Volver al Listado
                        </a>
                    </div>

                    <!-- Formulario de Edición -->
                    <form action="{{ route('seguimiento.update', $visita->id_visita) }}" method="POST" class="space-y-6" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Card del Formulario -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-lg font-semibold">Información de la Visita</h3>
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

                                <!-- ID Visita (solo lectura) -->
                                <div class="mb-4">
                                    <label for="id_visita" class="block text-sm font-medium text-gray-700 mb-1">ID Visita</label>
                                    <input type="text" 
                                           id="id_visita"
                                           value="{{ $visita->id_visita }}"
                                           class="form-input bg-gray-100"
                                           readonly>
                                    <p class="text-xs text-gray-500 mt-1">El ID de la visita no puede modificarse</p>
                                </div>

                                <!-- Campos en grid responsivo -->
                                <div class="grid-2">
                                    <!-- Motivo -->
                                    <div class="mb-4">
                                        <label for="motivo" class="block text-sm font-medium text-gray-700 mb-1">Motivo *</label>
                                        <input type="text" 
                                               name="motivo" 
                                               id="motivo"
                                               value="{{ old('motivo', $visita->motivo) }}"
                                               class="form-input @error('motivo') border-red-500 bg-red-50 @enderror"
                                               placeholder="Ej: Seguimiento espiritual">
                                        @error('motivo')
                                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Responsable -->
                                    <div class="mb-4">
                                        <label for="responsable" class="block text-sm font-medium text-gray-700 mb-1">Responsable *</label>
                                        <input type="text" 
                                               name="responsable" 
                                               id="responsable"
                                               value="{{ old('responsable', $visita->responsable) }}"
                                               class="form-input @error('responsable') border-red-500 bg-red-50 @enderror"
                                               placeholder="Ej: Pastor Juan Martínez">
                                        @error('responsable')
                                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid-2">
                                    <!-- Fecha -->
                                    <div class="mb-4">
                                        <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1">Fecha *</label>
                                        <input type="date" 
                                               name="fecha" 
                                               id="fecha"
                                               value="{{ old('fecha', $visita->fecha) }}"
                                               class="form-input @error('fecha') border-red-500 bg-red-50 @enderror">
                                        @error('fecha')
                                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Hora -->
                                    <div class="mb-4">
                                        <label for="hora" class="block text-sm font-medium text-gray-700 mb-1">Hora *</label>
                                        <input type="time" 
                                               name="hora" 
                                               id="hora"
                                               value="{{ old('hora', $visita->hora) }}"
                                               class="form-input @error('hora') border-red-500 bg-red-50 @enderror">
                                        @error('hora')
                                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Tipo -->
                                <div class="mb-4">
                                    <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">Tipo *</label>
                                    <select name="tipo" 
                                            id="tipo"
                                            class="form-input @error('tipo') border-red-500 bg-red-50 @enderror">
                                        <option value="">Seleccione un tipo</option>
                                        <option value="Visitado" {{ old('tipo', $visita->tipo) == 'Visitado' ? 'selected' : '' }}>Visitado</option>
                                        <option value="Visita" {{ old('tipo', $visita->tipo) == 'Visita' ? 'selected' : '' }}>Visita</option>
                                    </select>
                                    @error('tipo')
                                        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('seguimiento.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar Visita
                            </button>
                        </div>
                    </form>

                    <!-- Formulario de Eliminación -->
                    <div class="danger-zone mt-8">
                        <h4 class="text-lg font-semibold text-red-800 mb-2">Zona de Peligro</h4>
                        <p class="text-red-600 mb-4">Esta acción no se puede deshacer. Se eliminará permanentemente la visita.</p>
                        <form action="{{ route('seguimiento.destroy', $visita->id_visita) }}" method="POST" 
                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta visita? Esta acción no se puede deshacer.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash mr-2"></i> Eliminar Visita
                            </button>
                        </form>
                    </div>
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

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
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

        .form-input {
            border: 1px solid #d1d5db;
            padding: 10px 12px;
            width: 100%;
            border-radius: 6px;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(5, 85, 157, 0.1);
        }

        .form-input.border-red-500 {
            border-color: var(--danger);
            background-color: #fef2f2;
        }

        .bg-red-50 {
            background-color: #fef2f2;
        }

        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
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

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .danger-zone {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 0.5rem;
            padding: 1.5rem;
        }

        @media (max-width: 768px) {
            .grid-2 {
                grid-template-columns: 1fr;
            }
            
            .flex {
                flex-direction: column;
                gap: 1rem;
            }
            
            .flex .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <!-- Incluir Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</x-app-layout>