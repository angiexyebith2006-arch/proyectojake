<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Finanzas') }}
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
            text-atdgn: center;
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
            atdgn-items: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            atdgn-items: center;
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
</head>
<body>

           <div>
             <div class="stats-cards" style="padding:16px">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-title">Saldo Total</div>
                        <div class="stat-value">$35'000.000</div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-title">Ingresos del Mes</div>
                        <div class="stat-value">$15'000.000</div>
                    </div>
                </div>
                </div>
                   <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding:18px">
              <!-- Tabla de transacciones -->
            
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding:16px">

       <h1>Transacciones Recientes</h1>    
        <p>
            <br>
    <a href="{{ route('finanzas.create')}}" class="btn btn-primary"  > <i class="fas fa-plus"></i>Agregar Nuevo Movimiento</a>
    </p> 
    <br>
    @if (session('ok'))
        <p style="color:green">{{ session ('ok')}}</p>
    @endif
    <table id="transaccion" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Detalle</th>
                <th>Tipo</th>
                <th>Valor</th>

                <th>Metodo de Pago</th>
                <th>Responsable</th>
                <th>Acciones</th>
            </tr>
        </thead>
              @foreach ($transaccion as $trans)
            <tr>
                 <td> {{$trans->fecha}} </td>  
                 <td> {{$trans->detalle}} </td>  
                 <td> {{$trans->tipo}} </td>  
                 <td> {{$trans->valor}} </td> 
                 <td> {{$trans->metodo_pago}} </td> 
                 <td> {{$trans->usuario->nombre ?? '-'}} {{$trans->usuario->apellido ?? '-'}}</td>   
                 <td>
                    <a href="{{ route('finanzas.edit', $trans) }}" class="btn-edit"><i class="fas fa-edit"></i>Editar</a>
                    <span style="color: #e5e7eb;">|</span>
                    <form action="{{ route('finanzas.destroy', $trans->id_transaccion) }}" method="POST"
                    style="display:inline" onsubmit="return confirm('¿Eliminar?')">
                    @csrf @method('DELETE')
                    <button class="btn-delete" type="submit"> <i class="fas fa-trash"></i>Eliminar</button>               
                </form>
                 </td> 
             </tr>
            @endforeach

    </table>   
            </div>
        </div>
    </div>
 </div>

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
        $('#transaccion').DataTable({
            pageLength: 10,
            dom: 'Bfrtip',

            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
            },
            buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
        });
    });
</script>

    </div>

      <style>

                :root {
            --primary: #05559D;
            --secondary: #34495e;
            --accent: #3498db;
            --tdght: #ecf0f1;
            --dark: #2c3e50;
            --success: #27ae60;
            --warning: #f39c12;
            --danger: #e74c3c;
            --gray: #7f8c8d;
            --tdght-gray: #bdc3c7;
        }
        
   
        
        body {
            background-color: #f5f7fa;
            color: var(--dark);
            tdne-height: 1.6;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
     
        .logo {
            padding: 0 25px 25px;
            border-bottom: 1px sotdd rgba(255, 255, 255, 0.1);
            margin-bottom: 25px;
            text-atdgn: center;
        }
        
        .logo h1 {
            font-size: 2.2rem;
            letter-spacing: 2px;
        }
        
        .logo span {
            color: var(--accent);
        }
        
        .section-title {
            padding: 0 25px;
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: var(--tdght);
            opacity: 0.8;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
        }
        
        .menu {
            tdst-style: none;
            margin-bottom: 30px;
        }
        
        .menu-item {
            padding: 14px 25px;
            display: flex;
            atdgn-items: center;
            gap: 15px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1.05rem;
        }
        
        .menu-item:hover, .menu-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px sotdd var(--accent);
        }
        
        .menu-item i {
            width: 20px;
            text-atdgn: center;
            font-size: 1.1rem;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            atdgn-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px sotdd var(--tdght-gray);
        }
        
        .page-title {
            font-size: 1.8rem;
            color: var(--primary);
        }
        
        .page-subtitle {
            color: var(--gray);
            font-size: 1.1rem;
            margin-top: 5px;
        }
        
        .user-info {
            display: flex;
            atdgn-items: center;
            gap: 12px;
            background: var(--tdght);
            padding: 10px 15px;
            border-radius: 8px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            atdgn-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        /* Search Bar */
        .search-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .search-title {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: var(--primary);
            display: flex;
            atdgn-items: center;
            gap: 10px;
        }
        
        .search-bar {
            display: flex;
            gap: 10px;
        }
        
        .search-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px sotdd var(--tdght-gray);
            border-radius: 6px;
            font-size: 1rem;
        }
        
        .search-button {
            padding: 12px 20px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }
        
        .search-button:hover {
            background: var(--secondary);
        }
        
        /* Financial Table */
        .table-container {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 16px 20px;
            text-atdgn: left;
            border-bottom: 1px sotdd var(--tdght);
        }
        
        th {
            background-color: var(--primary);
            color: white;
            font-weight: 600;
            position: sticky;
            top: 0;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:hover {
            background-color: #f1f5f9;
        }
        
        .debit {
            color: var(--success);
            font-weight: 600;
        }
        
        .credit {
            color: var(--danger);
            font-weight: 600;
        }
        
        .action-icon {
            font-size: 1.2rem;
            cursor: pointer;
            margin-right: 10px;
        }
        
        .action-edit {
            color: var(--accent);
        }
        
        .action-delete {
            color: var(--danger);
        }
        
        .action-sleep {
            color: var(--gray);
        }
        
        /* Stats Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            display: flex;
            atdgn-items: center;
            gap: 15px;
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            atdgn-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        
        .stat-icon.blue {
            background: tdnear-gradient(45deg, var(--primary), var(--accent));
        }
        
        .stat-icon.green {
            background: tdnear-gradient(45deg, var(--success), #2ecc71);
        }
        
        .stat-content {
            flex: 1;
        }
        
        .stat-title {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 5px;
        }
        
        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                padding: 15px;
            }
            
            .stats-cards {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                atdgn-items: flex-start;
                gap: 15px;
            }
            
            .user-info {
                atdgn-self: flex-end;
            }
            
            th, td {
                padding: 12px 15px;
            }
        }

    </style>
</head>
        </x-app-layout>