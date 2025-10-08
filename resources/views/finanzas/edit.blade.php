<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Movimiento') }}
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
                        <a href="{{ route('finanzas.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver al Listado
                        </a>
                    </div>

                    <!-- Formulario de Edición -->
                    <form action="{{ route('finanzas.update', $transaccion->id_transaccion) }}" method="POST" class="space-y-6" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Card del Formulario -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-lg font-semibold">Información del Movimiento</h3>
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

                                <!-- Fecha -->
                                <div class="mb-4">
                                    <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha *</label>
                                    <input type="date" 
                                           name="fecha" 
                                           id="fecha"
                                           value="{{ old('fecha', $transaccion->fecha) }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('fecha') border-red-500 bg-red-50 @enderror">
                                    @error('fecha')
                                        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Detalle -->
                                <div class="mb-4">
                                    <label for="detalle" class="block text-sm font-medium text-gray-700">Detalle *</label>
                                    <input type="text" 
                                           name="detalle" 
                                           id="detalle"
                                           value="{{ old('detalle', $transaccion->detalle) }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('detalle') border-red-500 bg-red-50 @enderror"
                                           placeholder="Descripción del movimiento">
                                    @error('detalle')
                                        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Grid para Tipo y Valor -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <!-- Tipo de transacción -->
                                    <div>
                                        <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de movimiento *</label>
                                        <select name="tipo" 
                                                id="tipo"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('tipo') border-red-500 bg-red-50 @enderror">
                                            <option value="Debito" {{ old('tipo', $transaccion->tipo) == 'Debito' ? 'selected' : '' }}>Débito</option>
                                            <option value="Credito" {{ old('tipo', $transaccion->tipo) == 'Credito' ? 'selected' : '' }}>Crédito</option>
                                            <option value="Voto" {{ old('tipo', $transaccion->tipo) == 'Voto' ? 'selected' : '' }}>Voto</option>
                                        </select>
                                        @error('tipo')
                                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Valor -->
                                    <div>
                                        <label for="valor" class="block text-sm font-medium text-gray-700">Valor *</label>
                                        <input type="number" 
                                               name="valor" 
                                               id="valor"
                                               value="{{ old('valor', $transaccion->valor) }}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('valor') border-red-500 bg-red-50 @enderror"
                                               placeholder="0.00"
                                               step="0.01">
                                        @error('valor')
                                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Grid para Método de pago y Comité -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <!-- Método de pago -->
                                    <div>
                                        <label for="metodo_pago" class="block text-sm font-medium text-gray-700">Método de Pago *</label>
                                        <select name="metodo_pago" 
                                                id="metodo_pago"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('metodo_pago') border-red-500 bg-red-50 @enderror">
                                            <option value="Efectivo" {{ old('metodo_pago', $transaccion->metodo_pago) == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                                            <option value="Pago Virtual" {{ old('metodo_pago', $transaccion->metodo_pago) == 'Pago Virtual' ? 'selected' : '' }}>Pago Virtual</option>
                                        </select>
                                        @error('metodo_pago')
                                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Comité -->
                                    <div>
                                        <label for="comite" class="block text-sm font-medium text-gray-700">Comité</label>
                                        <input type="text" 
                                               name="comite" 
                                               id="comite"
                                               value="{{ old('comite', $transaccion->comite) }}"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('comite') border-red-500 bg-red-50 @enderror"
                                               placeholder="Nombre del comité">
                                        @error('comite')
                                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Usuario responsable -->
                                <div class="mb-4">
                                    <label for="codigo_usuario" class="block text-sm font-medium text-gray-700">Responsable *</label>
                                    <select name="codigo_usuario" 
                                            id="codigo_usuario"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('codigo_usuario') border-red-500 bg-red-50 @enderror">
                                        <option value="">Seleccione un responsable</option>
                                        @foreach($usuario as $user)
                                            <option value="{{ $user->id_numero_documento }}" 
                                                {{ old('codigo_usuario', $transaccion->codigo_usuario) == $user->id_numero_documento ? 'selected' : '' }}>
                                                {{ $user->nombre }} {{ $user->apellido }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('codigo_usuario')
                                        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('finanzas.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar Movimiento
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

        input.border-red-500, select.border-red-500, textarea.border-red-500 {
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

        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .gap-4 {
            gap: 16px;
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }
    </style>

    <!-- Incluir Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</x-app-layout>