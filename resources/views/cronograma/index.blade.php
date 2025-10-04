<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cumpleaños y Cronograma') }}
        </h2>
    </x-slot>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminApp - Cumpleaños</title>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <style>
        :root {
            --primary: #05559D;
            --secondary: #34495e;
            --accent: #3498db;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #27ae60;
            --warning: #f39c12;
            --danger: #e74c3c;
            --gray: #7f8c8d;
            --light-gray: #bdc3c7;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
        }

        /* Botones */
        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.6rem 1.2rem;
            border-radius: 0.5rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: 0.9rem;
            gap: 0.5rem;
        }

        .btn-primary {
            background-color: #3b82f6;
            color: white;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.4);
        }

        .btn-edit {
            padding: 0.5rem 1rem;
            background-color: #fbbf24;
            color: #1f2937;
            border-radius: 0.375rem;
            font-weight: 500;
            gap: 0.5rem;
            font-size: 0.875rem;
            box-shadow: 0 2px 4px rgba(251, 191, 36, 0.3);
        }

        .btn-edit:hover {
            background-color: #f59e0b;
            transform: translateY(-2px);
        }

        .btn-delete {
            padding: 0.5rem 1rem;
            background-color: #f63b3b;
            color: white;
            border-radius: 0.375rem;
            font-weight: 500;
            font-size: 0.875rem;
            box-shadow: 0 2px 4px rgba(255, 34, 0, 0.3);
        }

        .btn-delete:hover {
            background-color: #d62828;
            transform: translateY(-2px);
        }

        /* Tabla */
        .table-container {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: var(--primary);
            color: white;
            padding: 12px 15px;
        }

        td {
            padding: 12px 15px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f5f9;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Cumpleaños -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                <h1 class="text-2xl font-bold mb-4"><i class="fas fa-birthday-cake"></i> Cumpleaños</h1>  
                <p>
                    <a href="{{ route('cronograma.create')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nuevo Cumpleaños
                    </a>
                </p>

                @if (session('ok'))
                    <p class="text-green-600 font-semibold">{{ session('ok') }}</p>
                @endif

                <div class="table-container">
                    <table id="cumpleanos" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha Nacimiento</th>
                                <th>Código Usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cumpleanos as $cumple)
                                <tr>
                                    <td>{{ $cumple->nombre }}</td>
                                    <td>{{ $cumple->fecha_nacimiento }}</td>
                                    <td>{{ $cumple->codigo_usuario }}</td>
                                    <td class="flex gap-2">
                                        <a href="{{ route('cronograma.edit', $cumple) }}" class="btn-edit">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('cronograma.destroy', $cumple) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminarlo?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-delete">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Cronograma (Calendario) -->
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4"><i class="fas fa-calendar"></i> Cronograma</h2>

    <!-- Navegación de meses -->
    <div class="flex justify-between mb-4">
        <a href="{{ route('cronograma.index', ['mes' => $mes == 1 ? 12 : $mes - 1, 'anio' => $mes == 1 ? $anio - 1 : $anio]) }}" 
           class="btn btn-primary">
           <i class="fas fa-chevron-left"></i> Anterior
        </a>

        <span class="text-xl font-bold">{{ $meses[$mes] }} {{ $anio }}</span>

        <a href="{{ route('cronograma.index', ['mes' => $mes == 12 ? 1 : $mes + 1, 'anio' => $mes == 12 ? $anio + 1 : $anio]) }}" 
           class="btn btn-primary">
           Siguiente <i class="fas fa-chevron-right"></i>
        </a>
    </div>

    <div class="table-container">
        <table class="w-full text-center">
            <thead>
                <tr>
                    <th>Lun</th><th>Mar</th><th>Mié</th>
                    <th>Jue</th><th>Vie</th><th>Sáb</th><th>Dom</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @php
                        $primerDia = date("N", strtotime("$anio-$mes-01"));
                        $diasMes = date("t", strtotime("$anio-$mes-01"));
                    @endphp

                    {{-- Espacios en blanco antes del primer día --}}
                    @for ($i = 1; $i < $primerDia; $i++)
                        <td></td>
                    @endfor

                    {{-- Días del mes --}}
                    @for ($dia = 1; $dia <= $diasMes; $dia++)
                        <td class='border border-gray-300 p-2 align-top h-24'>
                            <div class='font-bold'>{{ $dia }}</div>

                            {{-- Mostrar eventos del día (actividades + cumpleaños) --}}
                            @if (!empty($eventos[$dia]))
                                @foreach ($eventos[$dia] as $evento)
                                    <div class='bg-blue-100 border-l-4 border-blue-500 text-sm text-gray-700 px-2 py-1 mb-1 rounded'>
                                        {!! $evento !!}
                                    </div>
                                @endforeach
                            @endif
                        </td>

                        {{-- Salto de fila al final de la semana --}}
                        @if (($dia + $primerDia - 1) % 7 == 0)
                            </tr><tr>
                        @endif
                    @endfor
                </tr>
            </tbody>
        </table>
    </div>
</div>


    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
        $(function() {
            $('#cumpleanos').DataTable({
                pageLength: 10,
                dom: 'Bfrtip',
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
</x-app-layout>



