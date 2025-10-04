<?php
// Archivo: iniciosesion.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión - JAKE</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-white">

  <div class="w-full max-w-sm p-6 bg-white rounded-lg">
    
    <!-- Logo JAKE-->
    <div class="flex justify-center mb-6">
      <img src="{{ asset('images\Logo.png')}}" alt="Logo" class="h-20 w-20" >
          
    </div>

    
    <!-- Texto de bienvenida -->
    <h2 class="text-center text-lg text-blue-700">Bienvenido</h2>
    <h1 class="text-center text-2xl font-semibold text-blue-800 mb-6">Iniciar Sesión</h1>

    <!-- Formulario -->
    <form action="validar_login.php" method="POST" class="space-y-4">
      
      <!-- Documento -->
      <div>
        <label for="documento" class="block text-sm font-medium text-gray-700">Documento</label>
        <input type="text" name="documento" id="documento" 
               class="mt-1 block w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" 
               required>
      </div>

      <!-- Contraseña -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
        <div class="relative">
          <input type="password" name="password" id="password" 
                 class="mt-1 block w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2 pr-10" 
                 required>
          <!-- Icono de mostrar contraseña -->
          <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 flex items-center pr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Recuperar contraseña -->
      <div class="text-right text-sm">
        <a href="#" class="text-gray-600 hover:text-blue-600">¿Olvidaste tu contraseña?</a>
      </div>

      <!-- Botón -->
      <div>
        <button type="submit" 
                class="w-full bg-blue-800 text-white py-2 rounded-md hover:bg-blue-900 transition">
          Iniciar Sesión
        </button>
      </div>

    </form>
  </div>

  <!-- Script mostrar/ocultar contraseña -->
  <script>
    function togglePassword() {
      const input = document.getElementById("password");
      input.type = input.type === "password" ? "text" : "password";
    }
  </script>

</body>
</html>