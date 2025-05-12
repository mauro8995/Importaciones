
@extends('layouts.admin')

@section('content')



<style>
.timeline {
    position: relative;
    padding: 20px 0;
    width: 100%;
    margin: 0 auto;
}

.timeline::before {
    content: '';
    position: absolute;
    width: 3px;
    background-color: #dee2e6;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -1.5px;
}

.timeline-step {
    position: relative;
    margin-bottom: 50px;
    width: 100%;
    display: flex;
    justify-content: center;
}

.timeline-content {
    padding: 20px;
    background-color: #fff;
    border-radius: 6px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    position: relative;
    width: 45%;
    margin: 0;
}

.timeline-step:nth-child(odd) .timeline-content {
    margin-right: 55%;
}

.timeline-step:nth-child(even) .timeline-content {
    margin-left: 55%;
}

.timeline-icon {
    width: 40px;
    height: 40px;
    background-color: #fff;
    border: 3px solid #007bff;
    border-radius: 50%;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
}
    </style>
<div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-5">Tracking de Importación</h1>
                
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5><i class="fas fa-box me-2"></i>Información del Producto</h5>
                                <p class="mb-1"><strong>Número de Tracking:</strong> <span id="trackingNumber">IMP2025001</span></p>
                                <p class="mb-1"><strong>Producto:</strong> <span id="productName">Laptop Dell XPS 15</span></p>
                                <p class="mb-1"><strong>Origen:</strong> <span id="origin">Shanghai, China</span></p>
                            </div>
                            <div class="col-md-6">
                                <h5><i class="fas fa-shipping-fast me-2"></i>Estado del Envío</h5>
                                <p class="mb-1"><strong>Estado Actual:</strong> <span class="badge bg-primary" id="currentStatus">En Tránsito</span></p>
                                <p class="mb-1"><strong>Fecha Estimada de Llegada:</strong> <span id="estimatedArrival">15/02/2025</span></p>
                                <p class="mb-1"><strong>Semanas Aprox:</strong> <span id="transitDays">4</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="timeline">
                    <div class="timeline-step">
                        <div class="timeline-content">
                            <h5>Orden Procesada</h5>
                            <p class="mb-0">15/01/2025 - 10:30</p>
                            <p>Pedido confirmado y procesado en origen</p>
                        </div>
                    </div>
                    
                    <div class="timeline-step">
                        <div class="timeline-content">
                            <h5>En Preparación</h5>
                            <p class="mb-0">17/01/2025 - 14:45</p>
                            <p>Producto empacado y listo para envío</p>
                        </div>
                    </div>
                    
                    <div class="timeline-step">
                        <div class="timeline-content">
                            <h5>En Tránsito Marítimo</h5>
                            <p class="mb-0">20/01/2025 - 08:15</p>
                            <p>Producto en ruta en barco de carga</p>
                        </div>
                    </div>
                    
                    <div class="timeline-step">
                        <div class="timeline-content">
                            <h5>En Aduana</h5>
                            <p class="mb-0">Pendiente</p>
                            <p>Trámites aduaneros y documentación</p>
                        </div>
                    </div>
                    
                    <div class="timeline-step">
                        <div class="timeline-content">
                            <h5>Entrega Final</h5>
                            <p class="mb-0">Pendiente</p>
                            <p>Entrega en destino final</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
          $(document).ready(function() {
            // Aquí puedes agregar la lógica para actualizar el estado del tracking
            function updateTrackingStatus(status) {
                $('#currentStatus').text(status);
            }
            
            // Función para calcular días en tránsito
            function updateTransitDays() {
                const startDate = new Date('2025-01-15');
                const currentDate = new Date();
                const diffTime = Math.abs(currentDate - startDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                $('#transitDays').text(diffDays);
            }
            
            // Actualizar días en tránsito cada día
            updateTransitDays();
            setInterval(updateTransitDays, 24 * 60 * 60 * 1000);
        });
</script>
@endsection