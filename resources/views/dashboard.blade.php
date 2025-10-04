<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Welcome Section -->
                <div class="welcome-section">
                    <h3 class="welcome-title">
                        <i class="fas fa-house mr-3"></i>
                        Bienvenido a JAKE 
                    </h3>
                    <p class="welcome-text">
                        JAKE es una aplicación diseñada para ayudar a las congregaciones cristianas a gestionar de manera eficiente la asistencia a servicios y eventos, realizar seguimiento pastoral a los miembros y administrar los recursos económicos de la Iglesia.
                    </p>
                </div>
                
                <!-- Dashboard Cards -->
                <div class="dashboard-cards">
                    <!-- Cumpleaños Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cumpleaños</h3>
                            <div class="card-icon blue">
                                <i class="fas fa-birthday-cake"></i>
                            </div>
                        </div>
                        <div class="card-value">12</div>
                        <p class="card-description">
                            Visualiza y gestiona los cumpleaños de los miembros de la congregación.
                        </p>
                        <a href="{{ route('cronograma.index') }}" class="card-button">
                            <i class="fas fa-eye mr-2"></i>Ver Cumpleaños
                        </a>
                    </div>
                    
                    <!-- Finanzas Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Reporte Financiero</h3>
                            <div class="card-icon green">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="card-value">$50'000.000</div>
                        <p class="card-description">
                            Gestiona de manera transparente y eficiente los recursos económicos de la congregación.
                        </p>
                        <a href="{{ route('finanzas.index') }}" class="card-button">
                            <i class="fas fa-chart-bar mr-2"></i>Ver Reporte
                        </a>
                    </div>
                    
                    <!-- Eventos Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Próximos Eventos</h3>
                            <div class="card-icon orange">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </div>
                        <div class="card-value">5</div>
                        <p class="card-description">
                            Revisa los servicios y eventos programados para los próximos días.
                        </p>
                        <a href="{{ route('actividades.index') }}" class="card-button">
                            <i class="fas fa-calendar mr-2"></i>Ver Eventos
                        </a>
                    </div>
                    
                    <!-- Seguimiento Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Seguimiento Requerido</h3>
                            <div class="card-icon red">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                        </div>
                        <div class="card-value">40</div>
                        <p class="card-description">
                            Miembros que necesitan seguimiento pastoral por inasistencias continuas.
                        </p>
                        <a href="{{ route('seguimiento.index') }}" class="card-button">
                            <i class="fas fa-users mr-2"></i>Contactar
                        </a>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="recent-activity">
                    <h3 class="activity-title">
                        <i class="fas fa-history mr-2"></i>
                        Actividad Reciente
                    </h3>
                    <ul class="activity-list">
                        <li class="activity-item">
                            <div class="activity-content">
                                <p class="activity-text">Nuevo miembro registrado: María González</p>
                                <span class="activity-time">Hace 2 horas</span>
                            </div>
                            <div class="activity-badge blue">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-content">
                                <p class="activity-text">Servicio dominical completado: 120 asistentes</p>
                                <span class="activity-time">Ayer</span>
                            </div>
                            <div class="activity-badge green">
                                <i class="fas fa-church"></i>
                            </div>
                        </li>
                        <li class="activity-item">
                            <div class="activity-content">
                                <p class="activity-text">Nueva ofrenda registrada: $1'500.000</p>
                                <span class="activity-time">Hace 2 días</span>
                            </div>
                            <div class="activity-badge orange">
                                <i class="fas fa-donate"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary: #05559D;
            --primary-light: #3b82f6;
            --secondary: #f59e0b;
            --secondary-light: #fbbf24;
            --accent: #3498db;
            --light: #f8fafc;
            --dark: #2c3e50;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --gray: #6b7280;
            --light-gray: #e5e7eb;
            --purple: #8b5cf6;
            --pink: #ec4899;
        }
        
        .welcome-section {
            background: linear-gradient(135deg, #fef3c7 0%, #fefce8 100%);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            border-left: 4px solid var(--secondary);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .welcome-title {
            font-size: 1.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            font-weight: 600;
        }
        
        .welcome-text {
            color: var(--gray);
            line-height: 1.7;
            font-size: 1.05rem;
            margin: 0;
        }
        
        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            border: 1px solid #f1f5f9;
            position: relative;
            overflow: hidden;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .card-title {
            font-size: 1.1rem;
            color: var(--dark);
            font-weight: 600;
            margin: 0;
        }
        
        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }
        
        .card-icon.blue { background: linear-gradient(135deg, var(--primary), var(--primary-light)); }
        .card-icon.green { background: linear-gradient(135deg, #10b981, #047857); }
        .card-icon.orange { background: linear-gradient(135deg, var(--secondary), var(--secondary-light)); }
        .card-icon.red { background: linear-gradient(135deg, #ef4444, #dc2626); }
        .card-icon.purple { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
        .card-icon.pink { background: linear-gradient(135deg, #ec4899, #db2777); }
        
        .card-value {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0.5rem 0;
            color: var(--dark);
            line-height: 1;
        }
        
        .card-description {
            color: var(--gray);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
            flex-grow: 1;
        }
        
        .card-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1rem;
            background-color: var(--light);
            color: var(--primary);
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            border: 1px solid #e2e8f0;
        }
        
        .card-button:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(5, 85, 157, 0.2);
        }
        
        /* Recent Activity */
        .recent-activity {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #f1f5f9;
        }
        
        .activity-title {
            font-size: 1.3rem;
            color: var(--dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            font-weight: 600;
        }
        
        .activity-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            background: #f8fafc;
            transition: background-color 0.3s ease;
        }
        
        .activity-item:hover {
            background: #f1f5f9;
        }
        
        .activity-item:last-child {
            margin-bottom: 0;
        }
        
        .activity-content {
            flex-grow: 1;
        }
        
        .activity-text {
            margin: 0 0 0.25rem 0;
            color: var(--dark);
            font-weight: 500;
        }
        
        .activity-time {
            font-size: 0.85rem;
            color: var(--gray);
        }
        
        .activity-badge {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            margin-left: 1rem;
            flex-shrink: 0;
        }
        
        .activity-badge.blue { background: var(--primary); }
        .activity-badge.green { background: #10b981; }
        .activity-badge.orange { background: var(--secondary); }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .dashboard-cards {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
            
            .card-value {
                font-size: 2rem;
            }
            
            .welcome-title {
                font-size: 1.3rem;
            }
            
            .activity-item {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .activity-badge {
                margin-left: 0;
                margin-top: 0.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .welcome-section {
                padding: 1.5rem;
            }
            
            .card {
                padding: 1.25rem;
            }
            
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .card-icon {
                margin-top: 0.5rem;
            }
        }
    </style>
</x-app-layout>