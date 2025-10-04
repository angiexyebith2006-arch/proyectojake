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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Botón Volver -->
                <div class="mb-6">
                    <a href="{{ route('finanzas.index') }}" 
                       class="text-white bg-yellow-500 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5">
                        <i class="fas fa-arrow-left"></i> Volver al Listado
                    </a>
                </div>

                <form action="{{ route('finanzas.update', $transaccion->id_transaccion) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- fecha -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="date" name="fecha" id="fecha" 
                               value="{{ old('fecha', $transaccion->fecha) }}"
                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 
                               border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               required />
                        <label for="fecha" class="peer-focus:font-medium absolute text-sm text-gray-500 
                               duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                               peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                               peer-focus:scale-75 peer-focus:-translate-y-6">Fecha</label>
                    </div>

                    <!-- Detalle -->
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="detalle" id="detalle" 
                               value="{{ old('detalle', $transaccion->detalle) }}"
                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 
                               border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               required />
                        <label for="detalle" class="peer-focus:font-medium absolute text-sm text-gray-500 
                               duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                               peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                               peer-focus:scale-75 peer-focus:-translate-y-6">Detalle</label>
                    </div>

                    <!-- Tipo de transaccion -->
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <select name="tipo" id="tipo"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 
                                    border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option value="Debito" {{ old('tipo', $transaccion->tipo) == 'Debito' ? 'selected' : '' }}>Debito</option>
                                <option value="Credito" {{ old('tipo', $transaccion->tipo) == 'Credito' ? 'selected' : '' }}>Credito</option>
                                <option value="Voto" {{ old('tipo', $transaccion->tipo) == 'Voto' ? 'selected' : '' }}>Voto</option>
                            </select>
                            <label for="tipo" class="peer-focus:font-medium absolute text-sm text-gray-500 
                                   duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                                   peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                   peer-focus:scale-75 peer-focus:-translate-y-6">Tipo de movimiento</label>
                        </div>

                        <!-- Valor de ingreso -->
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="number" name="valor" id="valor" 
                                   value="{{ old('valor', $transaccion->valor) }}"
                                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 
                                   border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                   required />
                            <label for="valor" class="peer-focus:font-medium absolute text-sm text-gray-500 
                                   duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                                   peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                   peer-focus:scale-75 peer-focus:-translate-y-6">Valor de Movimiento</label>
                        </div>
                    </div>

                    <!-- Metodo de pago -->
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <select name="metodo_pago" id="metodo_pago"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 
                                    border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option value="Efectivo" {{ old('metodo_pago', $transaccion->metodo_pago) == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                                <option value="Pago Virtual" {{ old('metodo_pago', $transaccion->metodo_pago) == 'Pago Virtual' ? 'selected' : '' }}>Pago Virtual</option>
                            </select>
                            <label for="metodo_pago" class="peer-focus:font-medium absolute text-sm text-gray-500 
                                   duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                                   peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                   peer-focus:scale-75 peer-focus:-translate-y-6">Método de Pago</label>
                        </div>

                        <!-- Comité -->
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="comite" id="comite" 
                                   value="{{ old('comite', $transaccion->comite) }}"
                                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 
                                   border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                            <label for="comite" class="peer-focus:font-medium absolute text-sm text-gray-500 
                                   duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                                   peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                                   peer-focus:scale-75 peer-focus:-translate-y-6">Comité</label>
                        </div>
                    </div>

                    <!-- Usuario que lo registra -->
                    <div class="relative z-0 w-full mb-5 group">
                        <select name="codigo_usuario" id="codigo_usuario"  
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 
                                border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                            <option value="">Seleccione un usuario</option>
                            @foreach($usuario as $usuario)
                                <option value="{{ $usuario->id_numero_documento }}" 
                                    {{ old('codigo_usuario', $transaccion->codigo_usuario) == $usuario->id_numero_documento ? 'selected' : '' }}>
                                    {{ $usuario->nombre }} {{ $usuario->apellido }}
                                </option>
                            @endforeach
                        </select>
                        <label for="codigo_usuario" class="peer-focus:font-medium absolute text-sm text-gray-500 
                               duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] 
                               peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                               peer-focus:scale-75 peer-focus:-translate-y-6">Nombre del Responsable</label>
                    </div>

                    <!-- Botón Actualizar -->
                    <button type="submit" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 
                            focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm 
                            w-full sm:w-auto px-5 py-2.5 text-center">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
