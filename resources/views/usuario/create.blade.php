<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuario') }}
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
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('usuario.store') }}" method="POST">
                    @csrf

                    <!-- Documento -->
                    <div class="mb-4">
                        <label class="block font-medium">Número de Documento</label>
                        <input type="text" name="id_numero_documento" value="{{ old('id_numero_documento') }}" class="w-full rounded-md border-gray-300" required>
                        @error('id_numero_documento') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tipo documento -->
                    <div class="mb-4">
                        <label class="block font-medium">Tipo de Documento</label>
                        <select name="tipo_documento" class="w-full rounded-md border-gray-300" required>
                            <option value="C.C." {{ old('tipo_documento') == 'C.C.' ? 'selected' : '' }}>C.C.</option>
                            <option value="T.I." {{ old('tipo_documento') == 'T.I.' ? 'selected' : '' }}>T.I.</option>
                        </select>
                        @error('tipo_documento') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="block font-medium">Nombre</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full rounded-md border-gray-300" required>
                        @error('nombre') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Apellido -->
                    <div class="mb-4">
                        <label class="block font-medium">Apellido</label>
                        <input type="text" name="apellido" value="{{ old('apellido') }}" class="w-full rounded-md border-gray-300" required>
                        @error('apellido') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Correo -->
                    <div class="mb-4">
                        <label class="block font-medium">Correo Electrónico</label>
                        <input type="email" name="correo_electronico" value="{{ old('correo_electronico') }}" class="w-full rounded-md border-gray-300" required>
                        @error('correo_electronico') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Fecha nacimiento -->
                    <div class="mb-4">
                        <label class="block font-medium">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="w-full rounded-md border-gray-300" required>
                        @error('fecha_nacimiento') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Bautizo -->
                    <div class="mb-4">
                        <label class="block font-medium">Bautizo</label>
                        <select name="bautizo" class="w-full rounded-md border-gray-300" required>
                            <option value="si" {{ old('bautizo') == 'si' ? 'selected' : '' }}>Sí</option>
                            <option value="no" {{ old('bautizo') == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('bautizo') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Bautizado Espíritu -->
                    <div class="mb-4">
                        <label class="block font-medium">Bautizado en el Espíritu</label>
                        <select name="bautizado_espiritu" class="w-full rounded-md border-gray-300" required>
                            <option value="si" {{ old('bautizado_espiritu') == 'si' ? 'selected' : '' }}>Sí</option>
                            <option value="no" {{ old('bautizado_espiritu') == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('bautizado_espiritu') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Teléfono -->
                    <div class="mb-4">
                        <label class="block font-medium">Teléfono</label>
                        <input type="text" name="telefono" value="{{ old('telefono') }}" class="w-full rounded-md border-gray-300" required>
                        @error('telefono') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Género -->
                    <div class="mb-4">
                        <label class="block font-medium">Género</label>
                        <select name="genero" class="w-full rounded-md border-gray-300" required>
                            <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ old('genero') == 'f' ? 'Femenino' : '' }}>Femenino</option>
                        </select>
                        @error('genero') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <label for= "contrasena" class="block font-medium">Contraseña</label>
                        <input type="password" name="contrasena" class="w-full rounded-md border-gray-300" required>
                        @error('contrasena') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-4">
                      <label for="contrasena_confirmation" class="block font-medium">Confirmar Contraseña</label>
                      <input type="password" name="contrasena_confirmation" class="w-full rounded-md border-gray-300" required>
                    </div>
                    <!-- Rol -->
                    <div class="mb-4">
                        <label for="rol" class="block font-medium">Seleccione un rol</label>
                        <select name="rol" class="w-full rounded-md border-gray-300" required>
                            @foreach($rol as $r)
                                <option value="{{ $r->id_rol }}">
                                    {{ $r->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('rol') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Cargo -->
                    <div class="mb-4">
                        <label class="block font-medium">Cargo</label>
                        <select name="cargo" class="w-full rounded-md border-gray-300" required>
                            @foreach($cargo as $c)
                                <option value="{{ $c->id_cargo }}" {{ old('cargo') == $c->nombre ? 'selected' : '' }}>
                                    {{ $c->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('cargo') <p class="text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('usuario.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2">Cancelar</a>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Guardar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

