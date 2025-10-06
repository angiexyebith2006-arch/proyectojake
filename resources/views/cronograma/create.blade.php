<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Nuevo Cumpleanos</h2>
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

    <div class="p-6">
        <form action="{{ route('cronograma.store') }}" method="POST">
            @csrf
            <label>Nombre</label>
            <input type="text" name="nombre" class="border p-2 w-full" required>

            <label>Fecha Nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="border p-2 w-full" required>

            <label>Código Usuario</label>
            <input type="number" name="codigo_usuario" class="border p-2 w-full" required>

            <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Guardar</button>
        </form>
    </div>
</x-app-layout>
