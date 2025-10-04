<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seguimiento') }}
        </h2>
    </x-slot>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminApp - Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#05559D',
                        secondary: '#f8f9fa',
                        accent: '#6c757d',
                        success: '#28a745',
                        danger: '#dc3545'
                    }
                }
            }
        }
    </script>
    
    <style>
        .dashboard-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Barra de navegación superior -->
    
    <!-- Visitas nuevas -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding:16px">

            <h1>Lista de nuevas visitas</h1>
            <p>
                <br>
                <a href="{{ route('seguimiento.create')}}"class="btn btn-primary">
                        <i class="fas fa-plus"></i>Solicitar visita</a>
            </p>
                <br>
        @if (session('ok'))
            <p style="color:green">{{ session('ok')}}</p>
        @endif
       <table id="visita" class="display" style="width:100%">
        
       <thead class="bg-blue-600 text-white">
    <tr>
        <th>Motivo</th>
        <th>Fecha</th>
        <th>Responsable</th>
        <th>Hora</th>
        <th>Tipo</th>
        <th>Acciones</th>
    </tr>
</thead>

              @foreach ($visita as $vis)
            <tr>
                 <td> {{$vis->motivo}} </td>  
                 <td> {{$vis->fecha}} </td>  
                 <td> {{$vis->responsable}} </td>  
                 <td> {{$vis->hora}} </td> 
                 <td> {{$vis->tipo}} </td> 
                 <td>
                    <a href="{{ route('seguimiento.edit', $vis) }}"class="btn-edit">
                                            <i class="fas fa-edit"></i>Editar</a>
                     <span style="color: #e5e7eb;">|</span>
                    <form action="{{ route('seguimiento.destroy', $vis) }}" method="POST"
                    style="display:inline" onsubmit="return confirm('¿Eliminar?')">
                    @csrf @method('DELETE')
                    <button type="submit"class="btn-delete">
                                                <i class="fas fa-trash"></i>Eliminar</button>               
                </form>
                 </td> 
             </tr>
            @endforeach
    </div>  
    
    </div>  
        </div>  

      {{-- jQuery + DataTables (CDN) --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet"
href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
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
        $('#visita').DataTable({
            pageLength: 10,
            dom: 'Bfrtip',

            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
            },
            buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
        });
    });
</script>


    </table>   
        <!-- Tarjetas de métricas principales -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Usuarios Activos -->
            <div class="dashboard-card bg-white p-6 rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="font-medium">Usuarios Activos</h5>
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-primary flex items-center justify-center">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-primary mb-2">142</h2>
                <div class="flex items-center">
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded mr-2">+12%</span>
                    <small class="text-gray-500">vs ayer</small>
                </div>
            </div>

            <!-- Saldo hoy -->
            <div class="dashboard-card bg-white p-6 rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="font-medium">Saldo hoy</h5>
                    <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-green-600 mb-2">$33,245.80</h2>
                <div class="flex items-center">
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded mr-2">+8%</span>
                    <small class="text-gray-500">vs ayer</small>
                </div>
            </div>

            <!-- Clientes Nuevos -->
            <div class="dashboard-card bg-white p-6 rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="font-medium">Clientes Nuevos</h5>
                    <div class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center">
                        <i class="fas fa-user-plus"></i>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-yellow-600 mb-2">27</h2>
                <div class="flex items-center">
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded mr-2">+5%</span>
                    <small class="text-gray-500">vs ayer</small>
                </div>
            </div>

            <!-- Actividad -->
            <div class="dashboard-card bg-white p-6 rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="font-medium">Actividad</h5>
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-blue-600 mb-2">16%</h2>
                <div class="flex items-center">
                    <small class="text-gray-500">Este Mes</small>
                </div>
            </div>
        </div>

        <!-- Sección de gráficos y estadísticas -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Gráfico de Asistencia -->
            <div class="lg:col-span-2 dashboard-card bg-white p-6 rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="font-medium">Asistencia por Semana</h5>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-xs bg-gray-100 rounded-lg hover:bg-gray-200">Semana</button>
                        <button class="px-3 py-1 text-xs bg-primary text-white rounded-lg">Mes</button>
                        <button class="px-3 py-1 text-xs bg-gray-100 rounded-lg hover:bg-gray-200">Año</button>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>

            <!-- Distribución por Género -->
            <div class="dashboard-card bg-white p-6 rounded-lg shadow-sm">
                <h5 class="font-medium mb-4">Distribución por Género</h5>
                <div class="space-y-4 mb-6">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span>Hombres</span>
                            <strong>25K</strong>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-primary h-2.5 rounded-full" style="width: 65%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <span>Mujeres</span>
                            <strong>17K</strong>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 35%"></div>
                        </div>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="genderChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Sección de contenido inferior -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Actividad Reciente -->
            <div class="dashboard-card bg-white p-6 rounded-lg shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="font-medium">Actividad Reciente</h5>
                    <button class="text-primary text-sm">Ver todo</button>
                </div>
                
                <div class="space-y-4">
                    <div class="border-l-2 border-primary pl-4">
                        <div class="flex justify-between">
                            <h6 class="font-semibold">$1'500.00, Debito</h6>
                            <small class="text-gray-500">11 JUL 6:10 PM</small>
                        </div>
                        <p class="text-gray-600">Transacción completada</p>
                    </div>
                    
                    <div class="border-l-2 border-green-500 pl-4">
                        <div class="flex justify-between">
                            <h6 class="font-semibold">Cumpleaños de Ana</h6>
                            <small class="text-gray-500">11 JUL 11 PM</small>
                        </div>
                        <p class="text-gray-600">Evento programado</p>
                    </div>
                    
                    <div class="border-l-2 border-blue-500 pl-4">
                        <div class="flex justify-between">
                            <h6 class="font-semibold">Nuevo Asistente</h6>
                            <small class="text-gray-500">11 JUL 7:64 PM</small>
                        </div>
                        <p class="text-gray-600">Registro completado</p>
                    </div>
                    
                    <div class="border-l-2 border-yellow-500 pl-4">
                        <div class="flex justify-between">
                            <h6 class="font-semibold">Carlos Ausente</h6>
                            <small class="text-gray-500">11 JUL 1:21 AM</small>
                        </div>
                        <p class="text-gray-600">Notificación enviada</p>
                    </div>
                    
                    <div class="border-l-2 border-purple-500 pl-4">
                        <div class="flex justify-between">
                            <h6 class="font-semibold">Nueva Actividad</h6>
                            <small class="text-gray-500">11 JUL 4:50 AM</small>
                        </div>
                        <p class="text-gray-600">Actividad programada</p>
                    </div>
                </div>
            </div>

            <!-- Distribución por Edad -->
            <div class="dashboard-card bg-white p-6 rounded-lg shadow-sm">
                <h5 class="font-medium mb-4">Distribución por Edad</h5>
                
                <div class="mb-6">
                    <div class="flex justify-between mb-2">
                        <span>18 Años Para arriba</span>
                        <strong>230K</strong>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 70%"></div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <div class="flex justify-between mb-2">
                        <span>3 Años a 17 Años</span>
                        <strong>100K</strong>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-blue-500 h-2.5 rounded-full" style="width: 30%"></div>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div class="text-center p-4 bg-gray-100 rounded-lg">
                        <h3 class="text-primary text-2xl font-bold mb-1">20</h3>
                        <small class="text-gray-600">Total Administradores</small>
                    </div>
                    <div class="text-center p-4 bg-gray-100 rounded-lg">
                        <h3 class="text-green-600 text-2xl font-bold mb-1">750K</h3>
                        <small class="text-gray-600">Total Asistentes</small>
                    </div>
                </div>
            </div>

            <!-- Resumen Financiero -->
            <div class="dashboard-card bg-white p-6 rounded-lg shadow-sm">
                <h5 class="font-medium mb-4">Resumen Financiero</h5>
                
                <div class="bg-gray-100 p-4 rounded-lg mb-4">
                    <div class="flex justify-between items-center">
                        <h4 class="text-green-600 text-xl font-bold">$50'000.000</h4>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">+5.2%</span>
                    </div>
                    <p class="text-gray-600">Saldo este Mes</p>
                </div>
                
                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <div class="flex justify-between items-center">
                        <h4 class="text-primary text-xl font-bold">100</h4>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">+12%</span>
                    </div>
                    <p class="text-gray-600">Asistentes retenidos</p>
                </div>
                
                <div class="text-center">
                    <button class="bg-primary text-white px-4 py-2 rounded-lg mr-2 hover:bg-blue-700 transition-colors">Generar Reporte</button>
                    <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">Exportar</button>
                </div>
            </div>
        </div>
    </div>

     <style>
        
         :root {
            --primary-color: #05559D;
            --secondary-color: #f8f9fa;
            --accent-color: #6c757d;
            --text-color: #333;
            --success-color: #28a745;
            --danger-color: #dc3545;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7f9;
            color: var(--text-color);
        }
        
        .sidebar {
            background-color: var(--primary-color);
            color: white;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
        }
        
        .sidebar .nav-tdnk {
            color: rgba(255, 255, 255, 0.8);
            padding: 15px 20px;
            margin: 5px 0;
            border-radius: 5px;
        }
        
        .sidebar .nav-tdnk:hover, .sidebar .nav-tdnk.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .sidebar .nav-tdnk i {
            margin-right: 10px;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        .header {
            background-color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px sotdd #eee;
            font-weight: 600;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
        }
        
        .btn-primary:hover {
            background-color: #2c3e5e;
        }
        
        .stats-card {
            text-at: center;
            padding: 20px;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .module-section {
            display: none;
        }
        
        .active-module {
            display: block;
        }
        
        .table-responsive {
            border-radius: 8px;
        }
        
        .user-profile {
            display: flex;
            at-items: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            at-items: center;
            justify-content: center;
            margin-right: 10px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>

    <style>
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
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
            align-items: center;
        }
        
        .btn-edit {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background-color: #fbbf24;
            color: #1f2937;
            border-radius: 0.375rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            gap: 0.5rem;
            font-size: 0.875rem;
            box-shadow: 0 2px 4px rgba(251, 191, 36, 0.3);
        }
        
        .btn-edit:hover {
            background-color: #f59e0b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(251, 191, 36, 0.4);
        }
        
        .btn-delete {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background-color: #f63b3b;
            color: white;
            border-radius: 0.375rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            gap: 0.5rem;
            font-size: 0.875rem;
            box-shadow: 0 2px 4px rgba(255, 34, 0, 0.3);
        }
        
        .btn-delete:hover {
            background-color: #f63b3b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 68, 0, 0.4);
        }
        
        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }
            
            .btn, .btn-edit, .btn-delete {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <script>
        // Gráfico de asistencia
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('attendanceChart').getContext('2d');
            const attendanceChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['S', 'M', 'T', 'W', 'T', 'F', 'S', 'M', 'T', 'W'],
                    datasets: [{
                        label: 'Asistentes',
                        data: [100, 100, 80, 40, 0, 60, 90, 120, 100, 110],
                        borderColor: '#4361ee',
                        backgroundColor: 'rgba(67, 97, 238, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
            
            // Gráfico de género
            const genderCtx = document.getElementById('genderChart').getContext('2d');
            const genderChart = new Chart(genderCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Hombres', 'Mujeres'],
                    datasets: [{
                        data: [65, 35],
                        backgroundColor: ['#05559D', '#f59e0b'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });


        
    </script>
</body>
</html>

</x-app-layout>
