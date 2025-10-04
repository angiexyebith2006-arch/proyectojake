<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
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

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">

                <form action="{{ route('usuario.update', $usuario->id_numero_documento) }}" method="POST">
                    @csrf
                    @method('PUT')

                     <div class="mb-4">
                        <label for="id_numero_documento" class="block text-sm font-medium">Número de Documento</label>
                        <input id="id_numero_documento" type="text" name="id_numero_documento" 
                               value="{{ old('id_numero_documento', $usuario->id_numero_documento) }}"
                               class="w-full rounded-md border-gray-300" required readonly>
                        @error('id_numero_documento')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium">Nombre</label>
                        <input id="nombre" type="text" name="nombre" 
                               value="{{ old('nombre', $usuario->nombre) }}"
                               class="w-full rounded-md border-gray-300" required>
                    </div>

                    <!-- Apellido -->
                    <div class="mb-4">
                        <label for="apellido" class="block text-sm font-medium">Apellido</label>
                        <input id="apellido" type="text" name="apellido" 
                               value="{{ old('apellido', $usuario->apellido) }}"
                               class="w-full rounded-md border-gray-300" required>
                    </div>

                    <!-- Tipo Documento -->
                    <div class="mb-4">
                        <label for="tipo_documento" class="block text-sm font-medium">Tipo Documento</label>
                        <select id="tipo_documento" name="tipo_documento" class="w-full rounded-md border-gray-300" required>
                            <option value="C.C." {{ old('tipo_documento', $usuario->tipo_documento) == 'C.C.' ? 'selected' : '' }}>C.C.</option>
                            <option value="T.I." {{ old('tipo_documento', $usuario->tipo_documento) == 'T.I.' ? 'selected' : '' }}>T.I.</option>
                        </select>
                    </div>

                    <!-- Correo -->
                    <div class="mb-4">
                        <label for="correo_electronico" class="block text-sm font-medium">Correo</label>
                        <input id="correo_electronico" type="email" name="correo_electronico"
                               value="{{ old('correo_electronico', $usuario->correo_electronico) }}"
                               class="w-full rounded-md border-gray-300" required>
                    </div>

                    <!-- Fecha nacimiento -->
                    <div class="mb-4">
    <label for="fecha_nacimiento" class="block text-sm font-medium">Fecha Nacimiento</label>
    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento"
           value="{{ old('fecha_nacimiento', $usuario->fecha_nacimiento->format('Y-m-d')) }}"
           class="w-full rounded-md border-gray-300" required>
            </div>

                    <!-- Teléfono -->
                    <div class="mb-4">
                        <label for="telefono" class="block text-sm font-medium">Teléfono</label>
                        <input id="telefono" type="number" name="telefono" 
                               value="{{ old('telefono', $usuario->telefono) }}"
                               class="w-full rounded-md border-gray-300" required>
                    </div>

                    <!-- Género -->
                    <div class="mb-4">
                        <label for="genero" class="block text-sm font-medium">Género</label>
                        <select id="genero" name="genero" class="w-full rounded-md border-gray-300" required>
                            <option value="Masculino" {{ old('genero', $usuario->genero) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ old('genero', $usuario->genero) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>

                    <!-- Bautizo -->
                    <div class="mb-4">
                        <label for="bautizo" class="block text-sm font-medium">Bautizo</label>
                        <select id="bautizo" name="bautizo" class="w-full rounded-md border-gray-300">
                            <option value="Sí" {{ old('bautizo', $usuario->bautizo) == 'Sí' ? 'selected' : '' }}>Sí</option>
                            <option value="No" {{ old('bautizo', $usuario->bautizo) == 'No' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <!-- Bautizado Espíritu -->
                    <div class="mb-4">
                        <label for="bautizado_espiritu" class="block text-sm font-medium">Bautizado Espíritu</label>
                        <select id="bautizado_espiritu" name="bautizado_espiritu" class="w-full rounded-md border-gray-300">
                            <option value="Sí" {{ old('bautizado_espiritu', $usuario->bautizado_espiritu) == 'Sí' ? 'selected' : '' }}>Sí</option>
                            <option value="No" {{ old('bautizado_espiritu', $usuario->bautizado_espiritu) == 'No' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <!-- Rol -->
                    <div class="mb-4">
                        <label for="rol" class="block text-sm font-medium">Rol</label>
                        <select id="rol" name="rol" class="w-full rounded-md border-gray-300" required>
                            @foreach($rol as $r)
                                <option value="{{ $r->id_rol }}" {{ old('rol', $usuario->rol) == $r->id_rol ? 'selected' : '' }}>
                                    {{ $r->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Cargo -->
                    <div class="mb-4">
                        <label for="cargo" class="block text-sm font-medium">Cargo</label>
                        <select id="cargo" name="cargo" class="w-full rounded-md border-gray-300" required>
                            @foreach($cargo as $c)
                                <option value="{{ $c->id_cargo }}" {{ old('cargo', $usuario->cargo) == $c->id_cargo ? 'selected' : '' }}>
                                    {{ $c->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <label for="contrasena" class="block text-sm font-medium">Contraseña (solo si deseas cambiarla)</label>
                        <input id="contrasena" type="password" name="contrasena"
                               class="w-full rounded-md border-gray-300">
                    </div>

                    <div class="mb-4">
    <label for="contrasena_confirmation" class="block text-sm font-medium">Confirmar Contraseña</label>
    <input id="contrasena_confirmation" type="password" name="contrasena_confirmation"
           class="w-full rounded-md border-gray-300"
           placeholder="Confirmar nueva contraseña">
</div>

                    <!-- Botón -->
                     <div class="mt-6">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Guardar Cambios
                        </button>
                        <a href="{{ route('usuario.index') }}" 
                           class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 ml-2">
                            Cancelar
                        </a>
                    </div>

                        

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
