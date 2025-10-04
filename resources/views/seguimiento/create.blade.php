<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitar Visita') }}
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <a href="{{ route('seguimiento.index') }}" class="btn btn-secondary mb-4">
                    <i class="fas fa-arrow-left"></i> Regresar al Listado
                </a>

                <form action="{{ route('seguimiento.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-lg font-semibold">Formulario visita</h3>
                        </div>
                        <div class="card-body p-6">

                            <!-- ID Visita -->
                            <div class="mb-4">
                                <label for="id_visita">ID Visita *</label>
                                <input type="number" 
                                       name="id_visita" 
                                       id="id_visita" 
                                       value="{{ old('id_visita', $proximoId) }}" 
                                       required 
                                       min="1">
                                @error('id_visita')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Motivo -->
                            <div class="mb-4">
                                <label for="motivo">Motivo *</label>
                                <input type="text" name="motivo" id="motivo" value="{{ old('motivo') }}" required>
                                @error('motivo')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Fecha -->
                            <div class="mb-4">
                                <label for="fecha">Fecha *</label>
                                <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                                @error('fecha')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Responsable -->
                            <div class="mb-4">
                                <label for="responsable">Responsable *</label>
                                <input type="text" name="responsable" id="responsable" value="{{ old('responsable') }}" required>
                                @error('responsable')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Hora -->
                            <div class="mb-4">
                                <label for="hora">Hora *</label>
                                <input type="time" name="hora" id="hora" value="{{ old('hora') }}" required>
                                @error('hora')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tipo de movimiento -->
                            <div class="mb-4">
                                <label for="tipo">Tipo de movimiento</label>
                                <select name="tipo" id="tipo" required>
                                    <option value="Visitado" {{ old('tipo')=='Visitado'?'selected':'' }}>Visitado</option>
                                    <option value="Visita" {{ old('tipo')=='Visita'?'selected':'' }}>Visita</option>
                                </select>
                            </div>

                            <!-- Código Usuario -->
                            <div class="mb-4">
                                <label for="codigo_usuario">Nombre del Responsable</label>
                                <select name="codigo_usuario" id="codigo_usuario" required>
                                    <option value="">Seleccione un usuario</option>
                                    @foreach($usuario as $u)
                                        <option value="{{ $u->id_numero_documento }}" {{ old('codigo_usuario')==$u->id_numero_documento?'selected':'' }}>
                                            {{ $u->nombre }} {{ $u->apellido }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('seguimiento.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Guardar Solicitud
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Estilos -->
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

        input, select, textarea {
            border: 1px solid #d1d5db;
            padding: 10px 12px;
            width: 100%;
            border-radius: 6px;
            transition: border-color 0.3s;
        }

        input:focus, select:focus, textarea:focus {
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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</x-app-layout>
