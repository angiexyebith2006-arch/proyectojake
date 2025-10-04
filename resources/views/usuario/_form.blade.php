<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <body class="flex items-center justify-center min-h-screen bg-white">

  <div class="w-full max-w-5xl p-8 bg-white rounded-lg">
    
    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <img src="{{ asset('images\Logo.png')}}" alt="Logo" 
           class="h-16">
    </div>

    <!-- Texto de bienvenida -->
    <h2 class="text-center text-lg text-blue-700">Bienvenido</h2>
    <h1 class="text-center text-2xl font-semibold text-blue-800 mb-6">Registro</h1>

    <!-- Formulario -->
    <form action="guardar_registro.php" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-6">

      <!-- Nombre -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" name="nombre" 
               class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
               required>
      </div>

      <!-- Apellido -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Apellido</label>
        <input type="text" name="apellido" 
               class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
               required>
      </div>

      <!-- Tipo de Documento -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Tipo de Documento</label>
        <select name="tipo_documento" 
                class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
                required>
          <option value="">SELECCIONE</option>
          <option value="C">C</option>
          <option value="T">T</option>
        </select>
      </div>

      <!-- Correo -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
        <input type="email" name="correo_electronico" 
               class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
               required>
      </div>

      <!-- Fecha de nacimiento -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" 
               class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
               required>
      </div>

      <!-- Bautizo -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Bautizo</label>
        <select name="bautizo" 
                class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
                required>
          <option value="">SELECCIONE</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <!-- Bautizado Espíritu -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Bautizado Espíritu</label>
        <select name="bautizado_espiritu" 
                class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
                required>
          <option value="">SELECCIONE</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

      <!-- Dirección -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Dirección</label>
        <input type="text" name="direccion" 
               class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
               required>
      </div>

      <!-- Teléfono -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Teléfono</label>
        <input type="tel" name="telefono" 
               class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
               required>
      </div>

      <!-- Género -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Género</label>
        <select name="genero" 
                class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
                required>
          <option value="">SELECCIONE</option>
          <option value="F">F</option>
          <option value="M">M</option>
        </select>
      </div>

      <!-- Contraseña -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input type="password" name="password" id="password" 
               class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
               required>
      </div>

      <!-- Confirmar Contraseña -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
        <input type="password" name="confirm_password" id="confirm_password" 
               class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
               required>
      </div>

    </form>

    <!-- Botón -->
    <div class="mt-6 text-center">
      <button type="submit" 
              form="formulario" 
              class="px-6 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">
        Registrarse
      </button>
    </div>

  </div>

</body>

            </div>
        </div>
    </div>
</x-app-layout>
