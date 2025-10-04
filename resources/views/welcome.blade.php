<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> rftgtyfffredr
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


    
    <!-- Barra superior -->
    <header class="bg-yellow-500 flex justify-between items-center px-6 py-4">
      <div class="flex items-center space-x-3">
        <!-- Logo -->
        <div class="p-1 rounded">
          <img src="{{ asset('images/Logo.png')}}" alt="Logo" class="h-10 w-10">
        </div>
        <!-- Nombre de la aplicación -->
    
      </div>
      
      <nav class="flex items-center space-x-8 text-lg font-semibold text-blue-900">
    
     
        <a href="{{ route('register') }}" class="hover:underline transition duration-300 flex items-center space-x-2">
          <i class="fas fa-user-plus text-xl"></i>
          <span>Registrarse</span>
        </a>
        <a href="{{ route('login') }}" class="hover:underline transition duration-300 flex items-center space-x-2">
          <i class="fas fa-sign-in-alt text-xl"></i>
          <span>Iniciar Sesión</span>
        </a>
      </nav>
    </header>
    
    <!-- Contenido principal (puedes agregar más contenido aquí) -->
    <main class="container mx-auto px-6 py-16">
      <!-- Puedes agregar contenido adicional aquí -->
    </main>
    
  </div>
</body>
</html>