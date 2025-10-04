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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

             
                <form action="{{ route('seguimiento.update', $visita->id_visita) }}" method="POST">
                    @csrf
                    @method('PUT')

                   
                    <div class="mb-4">
                        <label for="motivo" class="block text-gray-700">Motivo</label>
                        <input type="text" name="motivo" id="motivo" 
                            value="{{ old('motivo', $visita->motivo) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    
                    <div class="mb-4">
                        <label for="fecha" class="block text-gray-700">Fecha</label>
                        <input type="date" name="fecha" id="fecha" 
                            value="{{ old('fecha', $visita->fecha) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                  
                    <div class="mb-4">
                        <label for="responsable" class="block text-gray-700">Responsable</label>
                        <input type="text" name="responsable" id="responsable" 
                            value="{{ old('responsable', $visita->responsable) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    
                    <div class="mb-4">
                        <label for="hora" class="block text-gray-700">Hora</label>
                        <input type="time" name="hora" id="hora" 
                            value="{{ old('hora', $visita->hora) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                  
                    <div class="mb-4">
                        <label for="tipo" class="block text-gray-700">Tipo</label>
                        <select name="tipo" id="tipo" required>
                            <option value="Visitado" {{ old('tipo')=='Visitado'?'selected':'' }}>Visitado</option>
                            <option value="Visita" {{ old('tipo')=='Visita'?'selected':'' }}>Visita</option>
                         </select>
                            </div>
                    

                     
                    <div class="mt-6 text-center">
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700">
                        Actualizar Visita
                    </button>
                </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
