<?php
// Archivo: contactanos.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contáctanos - JAKE</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-white">

  <div class="w-full max-w-md p-8 bg-white rounded-lg">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <img src="https://upload.wikimedia.org/wikipedia/commons/3/3f/Placeholder_view_vector.svg" 
           alt="Logo JAKE" 
           class="h-16">
    </div>

    <!-- Encabezado -->
    <h2 class="text-center text-xl text-blue-700 font-semibold">Contáctanos</h2>
    <p class="text-center text-blue-600 mb-6">Estamos aquí para ayudarte</p>

    <!-- Formulario -->
    <form action="enviar_mensaje.php" method="POST" class="space-y-4">

      <!-- Nombre -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Nombre Completo</label>
        <input type="text" name="nombre" 
               class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
               required>
      </div>

      <!-- Correo -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
        <input type="email" name="correo" 
               class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
               required>
      </div>

      <!-- Asunto -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Asunto</label>
        <input type="text" name="asunto" 
               class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
               required>
      </div>

      <!-- Mensaje -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Mensaje</label>
        <textarea name="mensaje" rows="4" 
                  class="mt-1 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 p-2" 
                  required></textarea>
      </div>

      <!-- Botón -->
      <div class="text-center">
        <button type="submit" 
                class="px-6 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition">
          Enviar mensaje
        </button>
      </div>

    </form>
  </div>

</body>
</html>