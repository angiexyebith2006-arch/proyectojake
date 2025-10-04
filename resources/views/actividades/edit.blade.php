<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Actividad') }}
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
                    <div class="mb-6">
                        <a href="{{ route('actividades.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i> Volver al Listado
                        </a>
                    </div>

                    <!-- Formulario de Edición -->
                    <form action="{{ route('actividades.update', $actividad->id_actividad) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Campo oculto para enviar ID -->
                        <input type="hidden" name="id_actividad" value="{{ $actividad->id_actividad }}">

                        <!-- Card del Formulario -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-lg font-semibold text-gray-900">Editar Información de la Actividad</h3>
                            </div>
                            <div class="card-body">
                                <!-- ID Actividad (solo lectura) -->
                                <div class="mb-4">
                                    <label for="id_actividad" class="block text-sm font-medium text-gray-700 mb-1">ID Actividad</label>
                                    <input type="text" 
                                           id="id_actividad"
                                           value="{{ $actividad->id_actividad }}"
                                           class="form-input bg-gray-100"
                                           readonly>
                                    <p class="text-xs text-gray-500 mt-1">El ID de la actividad no puede modificarse</p>
                                </div>

                                <!-- Campos en grid responsivo -->
                                <div class="grid-2">
                                    <!-- Motivo -->
                                    <div class="mb-4">
                                        <label for="motivo" class="block text-sm font-medium text-gray-700 mb-1">Motivo *</label>
                                        <input type="text" 
                                               name="motivo" 
                                               id="motivo"
                                               value="{{ old('motivo', $actividad->motivo) }}"
                                               class="form-input"
                                               required
                                               placeholder="Ej: Culto de adoración dominical">
                                        @error('motivo')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Lugar -->
                                    <div class="mb-4">
                                        <label for="lugar" class="block text-sm font-medium text-gray-700 mb-1">Lugar *</label>
                                        <input type="text" 
                                               name="lugar" 
                                               id="lugar"
                                               value="{{ old('lugar', $actividad->lugar) }}"
                                               class="form-input"
                                               required
                                               placeholder="Ej: Santuario principal">
                                        @error('lugar')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid-2">
                                    <!-- Responsable -->
                                    <div class="mb-4">
                                        <label for="responsable" class="block text-sm font-medium text-gray-700 mb-1">Responsable *</label>
                                        <input type="text" 
                                               name="responsable" 
                                               id="responsable"
                                               value="{{ old('responsable', $actividad->responsable) }}"
                                               class="form-input"
                                               required
                                               placeholder="Ej: Pastor Juan Martínez">
                                        @error('responsable')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Fecha -->
                                    <div class="mb-4">
                                        <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1">Fecha *</label>
                                        <input type="date" 
                                               name="fecha" 
                                               id="fecha"
                                               value="{{ old('fecha', $actividad->fecha ? $actividad->fecha->format('Y-m-d') : '') }}"
                                               class="form-input"
                                               required>
                                        @error('fecha')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Hora -->
                                <div class="mb-4">
                                    <label for="hora" class="block text-sm font-medium text-gray-700 mb-1">Hora *</label>
                                    <input type="time" 
                                           name="hora" 
                                           id="hora"
                                           value="{{ old('hora', $actividad->hora ? \Carbon\Carbon::parse($actividad->hora)->format('H:i') : '') }}"
                                           class="form-input"
                                           required>
                                    @error('hora')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Mensaje -->
                                <div class="mb-4">
                                    <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-1">Mensaje o Observaciones</label>
                                    <textarea name="mensaje" 
                                              id="mensaje" 
                                              rows="4"
                                              class="form-textarea"
                                              placeholder="Ej: Traer Biblias y corazones dispuestos para alabar a Dios">{{ old('mensaje', $actividad->mensaje) }}</textarea>
                                    @error('mensaje')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="flex flex-buttons justify-end space-x-4">
                            <a href="{{ route('actividades.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-2"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i> Actualizar Actividad
                            </button>
                        </div>
                    </form>

                    <!-- Formulario de Eliminación -->
                    <div class="danger-zone mt-8">
                        <h4 class="text-lg font-semibold text-red-800 mb-2">Zona de Peligro</h4>
                        <p class="text-red-600 mb-4">Esta acción no se puede deshacer. Se eliminará permanentemente la actividad.</p>
                        <form action="{{ route('actividades.destroy', $actividad->id_actividad) }}" method="POST" 
                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta actividad? Esta acción no se puede deshacer.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash mr-2"></i> Eliminar Actividad
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background-color: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 1.5rem;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
        }
        
        .btn-secondary {
            background-color: #6b7280;
            color: white;
            border: 1px solid #6b7280;
        }
        
        .btn-secondary:hover {
            background-color: #4b5563;
            border-color: #4b5563;
        }
        
        .btn-primary {
            background-color: #3b82f6;
            color: white;
            border: 1px solid #3b82f6;
        }
        
        .btn-primary:hover {
            background-color: #2563eb;
            border-color: #2563eb;
        }
        
        .btn-danger {
            background-color: #ef4444;
            color: white;
            border: 1px solid #ef4444;
        }
        
        .btn-danger:hover {
            background-color: #dc2626;
            border-color: #dc2626;
        }
        
        .form-input {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-textarea {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: border-color 0.2s, box-shadow 0.2s;
            resize: vertical;
            min-height: 100px;
        }
        
        .form-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .danger-zone {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 0.5rem;
            padding: 1.5rem;
        }
        
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        @media (max-width: 768px) {
            .grid-2 {
                grid-template-columns: 1fr;
            }
            
            .flex-buttons {
                flex-direction: column;
                gap: 1rem;
            }
            
            .flex-buttons .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</x-app-layout>