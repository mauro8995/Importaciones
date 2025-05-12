@extends('layouts.admin')

<style>

#contenedor_dashboard .card {
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}
#contenedor_dashboard .card:hover {
    transform: translateY(-5px);
}
#contenedor_dashboard .card-header {
    background-color: #0d6efd;
    color: white;
    border-radius: 10px 10px 0 0 !important;
    font-weight: bold;
}
#contenedor_dashboard .stats-card {
    text-align: center;
    padding: 15px;
}
#contenedor_dashboard .stats-icon {
    font-size: 2rem;
    margin-bottom: 10px;
    color: #0d6efd;
}
#contenedor_dashboard .stats-number {
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 5px;
}
#contenedor_dashboard .stats-title {
    font-size: 0.9rem;
    color: #6c757d;
}
#contenedor_dashboard .navbar-brand {
    font-weight: bold;
    color: #0d6efd !important;
}
#contenedor_dashboard .chart-container {
    min-height: 300px;
}
#contenedor_dashboard #map-container {
    height: 400px;
    background-color: #e9ecef;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
}
#contenedor_dashboard .sidebar {
    background-color: #212529;
    color: #fff;
    min-height: 100vh;
    padding-top: 20px;
}
#contenedor_dashboard .sidebar-link {
    color: #adb5bd;
    text-decoration: none;
    display: block;
    padding: 10px 15px;
    transition: all 0.3s;
}
#contenedor_dashboard .sidebar-link:hover, #contenedor_dashboard .sidebar-link.active {
    color: #fff;
    background-color: rgba(255, 255, 255, 0.1);
}
#contenedor_dashboard .sidebar-link i {
    margin-right: 10px;
    width: 20px;
    text-align: center;
}
#contenedor_dashboard .content-wrapper {
    padding: 20px;
}
#contenedor_dashboard .dataTables_wrapper .dataTables_filter {
    margin-bottom: 15px;
}
#contenedor_dashboard .badge-warning {
    background-color: #ffc107;
    color: #000;
}
#contenedor_dashboard .badge-info {
    background-color: #0dcaf0;
}
#contenedor_dashboard .badge-success {
    background-color: #198754;
}
#contenedor_dashboard .badge-danger {
    background-color: #dc3545;
}
#contenedor_dashboard .action-buttons i {
    cursor: pointer;
    font-size: 1.1rem;
    margin: 0 5px;
}
#contenedor_dashboard .action-buttons i.fa-eye {
    color: #0d6efd;
}
#contenedor_dashboard .action-buttons i.fa-edit {
    color: #198754;
}
#contenedor_dashboard .action-buttons i.fa-trash-alt {
    color: #dc3545;
}
</style>
@section('content')
<div class="container-fluid" id="contenedor_dashborad">
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-shipping-fast me-2"></i>Sistema de Importaciones
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-chart-line"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-clipboard-list"></i> Órdenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-truck"></i> Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-file-alt"></i> Reportes</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <select class="form-select me-2" id="periodo-selector">
                        <option value="7">Últimos 7 días</option>
                        <option value="30" selected>Últimos 30 días</option>
                        <option value="90">Últimos 90 días</option>
                        <option value="365">Último año</option>
                    </select>
                    <button class="btn btn-outline-primary" type="button">
                        <i class="fas fa-sync-alt"></i> Actualizar
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Fila de Tarjetas de Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card stats-card">
                <i class="fas fa-truck-moving stats-icon"></i>
                <div class="stats-number">152</div>
                <div class="stats-title">ÓRDENES ACTIVAS</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card">
                <i class="fas fa-check-circle stats-icon"></i>
                <div class="stats-number">89</div>
                <div class="stats-title">COMPLETADAS ESTE MES</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card">
                <i class="fas fa-exclamation-triangle stats-icon" style="color: #ffc107;"></i>
                <div class="stats-number">12</div>
                <div class="stats-title">CON RETRASO</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card">
                <i class="fas fa-dollar-sign stats-icon" style="color: #198754;"></i>
                <div class="stats-number">$384,721</div>
                <div class="stats-title">VALOR TOTAL</div>
            </div>
        </div>
    </div>

    <!-- Fila de Gráficos Principales -->
    <div class="row mb-4">
        <!-- Gráfico de Órdenes Mensuales -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-2"></i>Órdenes por Mes
                </div>
                <div class="card-body">
                    <div id="ordenes-mes-chart" class="chart-container"></div>
                </div>
            </div>
        </div>
        <!-- Gráfico de Estado de Órdenes -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-2"></i>Estado de Órdenes
                </div>
                <div class="card-body">
                    <div id="estado-ordenes-chart" class="chart-container"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fila de Costos y Proveedores -->
    <div class="row mb-4">
        <!-- Gráfico de Costos de Transporte -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-money-bill-wave me-2"></i>Costos de Transporte por Ruta
                </div>
                <div class="card-body">
                    <div id="costos-transporte-chart" class="chart-container"></div>
                </div>
            </div>
        </div>
        <!-- Gráfico de Rendimiento de Proveedores -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-users me-2"></i>Rendimiento de Proveedores
                </div>
                <div class="card-body">
                    <div id="rendimiento-proveedores-chart" class="chart-container"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fila de Mapa y Tabla -->
    <div class="row mb-4">
        <!-- Mapa de Envíos -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-map-marker-alt me-2"></i>Seguimiento de Envíos
                </div>
                <div class="card-body">
                    <div id="map-container">
                        <p class="text-center text-muted">
                            <i class="fas fa-map fa-4x mb-3"></i><br>
                            Mapa de ubicación de envíos activos
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabla de Órdenes Recientes con DataTables -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list-ul me-2"></i>Órdenes Recientes
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabla-ordenes" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Orden #</th>
                                    <th>Proveedor</th>
                                    <th>Fecha Entrega</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ORD-2025</td>
                                    <td>Logistics Express</td>
                                    <td>05/06/2025</td>
                                    <td><span class="badge bg-success">En tránsito</span></td>
                                    <td class="text-center action-buttons">
                                        <i class="fas fa-eye" title="Ver detalles"></i>
                                        <i class="fas fa-edit" title="Editar"></i>
                                        <i class="fas fa-trash-alt" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ORD-2024</td>
                                    <td>Global Shipping</td>
                                    <td>06/05/2025</td>
                                    <td><span class="badge bg-primary">Procesada</span></td>
                                    <td class="text-center action-buttons">
                                        <i class="fas fa-eye" title="Ver detalles"></i>
                                        <i class="fas fa-edit" title="Editar"></i>
                                        <i class="fas fa-trash-alt" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ORD-2023</td>
                                    <td>Fast Carriers</td>
                                    <td>10/05/2025</td>
                                    <td><span class="badge bg-warning text-dark">Con retraso</span></td>
                                    <td class="text-center action-buttons">
                                        <i class="fas fa-eye" title="Ver detalles"></i>
                                        <i class="fas fa-edit" title="Editar"></i>
                                        <i class="fas fa-trash-alt" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ORD-2022</td>
                                    <td>Sea Transport</td>
                                    <td>01/05/2025</td>
                                    <td><span class="badge bg-info">En puerto</span></td>
                                    <td class="text-center action-buttons">
                                        <i class="fas fa-eye" title="Ver detalles"></i>
                                        <i class="fas fa-edit" title="Editar"></i>
                                        <i class="fas fa-trash-alt" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ORD-2021</td>
                                    <td>Air Cargo Plus</td>
                                    <td>30/04/2025</td>
                                    <td><span class="badge bg-success">Entregada</span></td>
                                    <td class="text-center action-buttons">
                                        <i class="fas fa-eye" title="Ver detalles"></i>
                                        <i class="fas fa-edit" title="Editar"></i>
                                        <i class="fas fa-trash-alt" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ORD-2020</td>
                                    <td>Maritime Solutions</td>
                                    <td>28/04/2025</td>
                                    <td><span class="badge bg-success">Entregada</span></td>
                                    <td class="text-center action-buttons">
                                        <i class="fas fa-eye" title="Ver detalles"></i>
                                        <i class="fas fa-edit" title="Editar"></i>
                                        <i class="fas fa-trash-alt" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ORD-2019</td>
                                    <td>Quick Transport</td>
                                    <td>25/04/2025</td>
                                    <td><span class="badge bg-success">Entregada</span></td>
                                    <td class="text-center action-buttons">
                                        <i class="fas fa-eye" title="Ver detalles"></i>
                                        <i class="fas fa-edit" title="Editar"></i>
                                        <i class="fas fa-trash-alt" title="Eliminar"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen financiero -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-chart-line me-2"></i>Tendencia de Costos de Transporte
                </div>
                <div class="card-body">
                    <div id="tendencia-costos-chart" class="chart-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
  <!-- Script para los gráficos y funcionalidades -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/10.2.0/highcharts.js"></script>
    <script>
        $(document).ready(function() {
            // Inicializar DataTables
            $('#tabla-ordenes').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                },
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                responsive: true
            });

            // Datos de ejemplo para gráficos
            const meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
            const datosOrdenes = [42, 52, 67, 58, 73, 85, 73, 68, 92, 110, 125, 98];
            const datosCompletadas = [40, 48, 62, 55, 67, 83, 68, 64, 86, 95, 110, 89];
            
            // Gráfico de Órdenes por Mes
            Highcharts.chart('ordenes-mes-chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: meses,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Número de órdenes'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Órdenes Creadas',
                    data: datosOrdenes,
                    color: '#0d6efd'
                }, {
                    name: 'Órdenes Completadas',
                    data: datosCompletadas,
                    color: '#20c997'
                }]
            });

            // Gráfico de Estado de Órdenes
            Highcharts.chart('estado-ordenes-chart', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: null
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Órdenes',
                    colorByPoint: true,
                    data: [{
                        name: 'En tránsito',
                        y: 42.8,
                        color: '#0d6efd'
                    }, {
                        name: 'Procesadas',
                        y: 25.5,
                        color: '#6c757d'
                    }, {
                        name: 'Con retraso',
                        y: 8.2,
                        color: '#ffc107'
                    }, {
                        name: 'En puerto',
                        y: 10.3,
                        color: '#0dcaf0'
                    }, {
                        name: 'Entregadas',
                        y: 13.2,
                        color: '#20c997'
                    }]
                }]
            });

            // Gráfico de Costos de Transporte
            Highcharts.chart('costos-transporte-chart', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: ['Asia-Pacífico', 'Europa', 'Norteamérica', 'Latinoamérica', 'África'],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Costo promedio ($)',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' USD'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 80,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: '#FFFFFF',
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Marítimo',
                    data: [4300, 3500, 3800, 2900, 4100],
                    color: '#0d6efd'
                }, {
                    name: 'Aéreo',
                    data: [8700, 7900, 8100, 7200, 9500],
                    color: '#6f42c1'
                }]
            });

            // Gráfico de Rendimiento de Proveedores
            Highcharts.chart('rendimiento-proveedores-chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: [
                        'Logistics Express',
                        'Global Shipping',
                        'Fast Carriers',
                        'Sea Transport',
                        'Air Cargo Plus'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Puntuación (1-10)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Puntualidad',
                    data: [8.5, 7.8, 6.9, 8.3, 9.1],
                    color: '#0d6efd'
                }, {
                    name: 'Precio',
                    data: [7.9, 8.5, 9.2, 7.5, 6.8],
                    color: '#198754'
                }, {
                    name: 'Calidad Servicio',
                    data: [8.7, 8.1, 7.4, 7.9, 8.8],
                    color: '#6f42c1'
                }]
            });

            // Gráfico de Tendencia de Costos
            Highcharts.chart('tendencia-costos-chart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: meses
                },
                yAxis: {
                    title: {
                        text: 'Costo promedio por orden ($)'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true
                    }
                },
                series: [{
                    name: 'Costo transporte',
                    data: [3200, 3100, 3400, 3700, 3900, 4100, 4300, 4200, 4500, 4700, 4600, 4400],
                    color: '#0d6efd'
                }, {
                    name: 'Costo aduana',
                    data: [1900, 1800, 2000, 2100, 2300, 2400, 2500, 2600, 2700, 2800, 2900, 2700],
                    color: '#dc3545'
                }, {
                    name: 'Otros gastos',
                    data: [800, 750, 850, 900, 950, 1000, 1050, 1100, 1150, 1200, 1250, 1300],
                    color: '#ffc107'
                }]
            });

            // Evento de cambio en selector de período
            $('#periodo-selector').change(function() {
                // Aquí se implementaría la lógica para actualizar los datos según el período seleccionado
                console.log("Período seleccionado: " + $(this).val() + " días");
                // En una implementación real, aquí se harían llamadas AJAX para obtener nuevos datos
            });

            // Tooltips para los botones de acción
            $('[data-toggle="tooltip"]').tooltip();

            // Funcionalidad para los botones de acción
            $('.action-buttons i').click(function() {
                let action = $(this).attr('class').split(' ')[1];
                let orderId = $(this).closest('tr').find('td:first').text();
                
                if(action === 'fa-eye') {
                    alert('Ver detalles de la orden: ' + orderId);
                    // Aquí se implementaría la lógica para mostrar detalles
                } else if(action === 'fa-edit') {
                    alert('Editar la orden: ' + orderId);
                    // Aquí se implementaría la lógica para editar
                } else if(action === 'fa-trash-alt') {
                    if(confirm('¿Está seguro que desea eliminar la orden ' + orderId + '?')) {
                        alert('Orden eliminada: ' + orderId);
                        // Aquí se implementaría la lógica para eliminar
                    }
                }
            });
        });
    </script>
@endsection