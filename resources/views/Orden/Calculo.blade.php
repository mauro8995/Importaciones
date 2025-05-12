@extends('layouts.admin')




@section('content')
<style>


        .step-indicator {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            position: relative;
        }

        .step {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.5rem;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .step.active .step-number {
            background-color: #0d6efd;
            color: white;
        }

        .step.completed .step-number {
            background-color: #198754;
            color: white;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #e9ecef;
            z-index: 0;
            margin: 0 10%;
        }

        .progress-line-fill {
            height: 100%;
            background-color: #198754;
            width: 0%;
            transition: width 0.3s;
        }

        .card {
            display: none;
        }

        .card.active {
            display: block;
        }


        .table-container .handsontable {
            height: 250px;
            margin: 20px 0;
        }

        .accordion-button:not(.collapsed) {
            background-color: #031633 !important;
            color: white;
        }

        .collapsed{
            margin-left: 0px !important;
        }
        .accordion-header, .accordion-button{
            background-color: #0B1E3A !important;
        }
        .bg-pink {
            background-color: #c3bdb7;
        }

        .bg-orange {
            background-color: #c3bdb7;
        }

        .bg-blue {
           background-color: #031633;
        }
        .bg-yellow{
            background-color: #FFFF00;
        }
        .bg-green {
            background-color: #00B074;
        }

        .bg-danger{
            background-color: #c3bdb7 !important;
        }
        .bg-custom-light {
            background-color: #f8f9fa;
        }
        .border-left-primary {
            border-left: 4px solid #0d6efd;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        #consolidationTable tbody tr td{
            font-size: 13px !important;
        } 
    </style>

<div class="container mt-4">
        <!-- Indicador de Progreso -->
        <div class="step-indicator mb-4">
            <div class="progress-line">
                <div class="progress-line-fill" id="progressLine"></div>
            </div>
            <div class="step active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-label">Información Básica</div>
            </div>
            <div class="step" data-step="2">
                <div class="step-number">2</div>
                <div class="step-label">Detalles de Envío</div>
            </div>
            <div class="step" data-step="3">
                <div class="step-number">3</div>
                <div class="step-label">Calculo Import</div>
            </div>
            <div class="step" data-step="4">
                <div class="step-number">4</div>
                <div class="step-label">Calculo Margen</div>
            </div>
        </div>

        <!-- Formulario -->
        <form id="importOrderForm">

          
            <!-- Card 1: Información Básica -->
            <div class="card active" data-step="1">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Información Básica</h5>
                </div>
                <div class="card-body">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="moneda" class="form-label">Cliente</label>
                                <select class="form-select" id="idCliente" name="idCliente" style="width: 100%;">
                                    @foreach ($cliente as $item )
                                        <option value="{{$item->EMP_ID}}">{{$item->EMP_NAME}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="moneda" class="form-label">Proveedor</label>
                                <select class="form-select" id="idProveedor" name="idProveedor" style="width: 100%;">
                                    @foreach ($proveedor as $item )
                                        <option value="{{$item->PRO_ID}}">{{$item->PRO_NOMBRE}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="moneda" class="form-label">Pais de Origen</label>
                                <select class="form-select" id="idPaisOrigen" name="idPaisOrigen" style="width: 100%;">
                                    @foreach ($pais as $item )
                                        <option value="{{$item->PA_ID}}">{{$item->PA_NOMBRE}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="moneda" class="form-label">Pais de Destino</label>
                                <select class="form-select" id="idPaisDestino" name="idPaisDestino" style="width: 100%;">
                                    @foreach ($pais as $item )
                                        <option value="{{$item->PA_ID}}">{{$item->PA_NOMBRE}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="moneda" class="form-label">Provincia</label>
                                <select class="form-select" id="idProvincia" name="idProvincia" style="width: 100%;">
                                    @foreach ($provincia as $item )
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="idDepartamento" class="form-label">Departamento</label>
                                <select class="form-select" id="idDepartamento" name="idDepartamento" style="width: 100%;">
                                    @foreach ($departamento as $item )
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="moneda" class="form-label">Distrito</label>
                                <select class="form-select" id="idDistrito" name="idDistrito" style="width: 100%;">
                                    @foreach ($distrito as $item )
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tipoEnvio" class="form-label">Tipo de Envío *</label>
                                <select class="form-select" id="tipoEnvio" name="tipoEnvio" style="width: 100%;" >
                                    <option value="1">Maritimo</option>
                                    <option value="2">Aéreos</option>
                                </select>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="direccion" class="form-label">Dirección de Entrega *</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" >
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="metodoPago" class="form-label">Método de Pago</label>
                                <select class="form-select" id="idMetodopago" name="idMetodopago" style="width: 100%;" >
                                    <option value="1">Transferencia Bancaria</option>
                                    <option value="2">Tarjeta de credito</option>
                                </select>
                            </div>

                            
                        </div>
                        <div class="row">
                            
                            <div class="col-4 mb-3">
                                <label for="documentos" class="form-label">Documentos Adjuntos</label>
                                <input type="file" class="form-control" id="documentos" multiple>
                                <div class="form-text">Puede seleccionar múltiples archivos</div>
                            </div>  
                        </div>
                    </fieldset>
                 <fieldset>
                    <div class="row">
                        
                        <div class="col-12 mb-3">
                            <label for="comentarios" class="form-label">Comentarios</label>
                            <textarea class="form-control" id="comentarios" rows="3"></textarea>
                        </div>
                    </div>
                 </fieldset>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-primary " onclick="nextStep(1)">Siguiente</button>
                </div>
            </div>

            <!-- Card 2: Detalles de Envío -->
            <div class="card " id="card-2" data-step="2">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Detalles de Envío</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 pb-3">
                            <button id="addProduct" class="btn btn-primary">Agregar Producto</button>
                        </div>                    
                    </div>
                    <div class="row">
                        <table id="table-producto" class="display">
                            <thead>
                            <tr>
                                <!-- scope="col" is optional if the th is inside a thead -->
                                <th scope="col" >Producto</th>
                                <th scope="col" >Semanas</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Prod. Cod. cliente</th>
                                <th scope="col">Unidad Medida</th>
                                <th scope="col">cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acc.</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Anterior</button>
                    <button type="button" class="btn btn-primary paso2" onclick="nextStep(2)">Siguiente</button>
                </div>
            </div>

            <!-- Card 3: Documentación -->
            <div class="card" data-step="3">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Calculo de importación</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p><i class="fas fa-flag-usa me-2"></i><strong>Origen:</strong> Estados Unidos</p>
                        </div>
                        <div class="col-md-4">
                            <p><i class="fas fa-map-marker-alt me-2"></i><strong>Destino:</strong> Puerto del Callao</p>
                        </div>
                        <div class="col-md-4">
                            <p><i class="fas fa-truck-loading me-2"></i><strong>Tipo:</strong> Marítimo</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class=" border-left-primary shadow-sm h-100 card-hover">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Sub Total Valor</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:black" id="resumen-total-precio">$125,000</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class=" border-left-primary shadow-sm h-100 card-hover">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Sub Total Peso</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:black" id="resumen-total-peso">2,500 KG</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-weight-hanging fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class=" border-left-primary shadow-sm h-100 card-hover">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Sub Total Items</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:black" id="resumen-total-cantidad">150</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-boxes fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="controls">
                            <label for="targetWeek">Consolidar en semana:</label>
                            <input id="targetWeek" class="target-week-select">
                            <button id="consolidateButton" class="btn btn-success">Consolidar Seleccionados</button>
                        </div>
                    
                        <table id="consolidationTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="selectAll">
                                    </th>
                                    <th>Semana</th>
                                    <th>Semanas Agrupadas</th>
                                    <th>Cantidad Total</th>
                                    <th>Valor Total</th>
                                    <th>Tipo envio</th>
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    
                </div>
         
                <div class="card-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Anterior</button>
                    <button type="submit" class="btn btn-secondary pasomargen" onclick="nextStep(3)">Siguiente</button>
                </div>
            </div>

            <!-- Card 4: Documentación -->
            <div class="card" data-step="4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Calculo margen</h5>
                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-12">
                            <table id="table_margen" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>HS CODE</th>
                                        <th>PARTIDA</th>
                                        <th>ARANCEL</th>
                                        <th>CIF VALUE</th>
                                        <th>AD/VALOREM</th>
                                        <th>TOTAL AD/VALOREM</th>
                                        <th>UNIT PRICE USD</th>
                                        <th>TOTAL USD</th>
                                        <th>MARK-UP %</th>
                                        <th>MARK-UP UNIT, US$</th>
                                        <th>MARK-UP TOTAL, USD</th>
                                        <th>SALE UNIT PRICE USD</th>
                                        <th>SALE TOTAL USD</th>
                                        <th>DELIVERY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="col-3">
                            <button onclick="enviarCotizacion()" class="btn btn-success"> Cotizacion</button>
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" onclick="prevStep(4)">Anterior</button>
                    <div  class="btn btn-secondary" onclick="guardarOrden(2)">Guardar y ir lista</div>
                    <div  class="btn btn-secondary" onclick="guardarOrden(1)" >Guardar y registrar otro</div>
                </div>
            </div>
        </form>
    </div>

        
    @include( 'Orden.modal_calcular')


<!-- Modal detalle producto -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="formModalLabel">Informacion del Producto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Campos Requeridos -->
                    <div class="border p-3 mb-4 rounded bg-white">
                        <h5 class="mb-3 text-primary">Información Principal</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="origen" class="form-label text-muted">Origen:</label>
                                <input type="text" class="form-control bg-white" id="origen" name="origen">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="destino" class="form-label text-muted">Destino:</label>
                                <input type="text" class="form-control bg-white" id="destino" name="destino">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="marca" class="form-label fw-bold">Marca: *</label>
                                <input type="text" class="form-control" id="marca" name="marca" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="vendedor" class="form-label fw-bold">Vendedor: *</label>
                                <input type="text" class="form-control" id="vendedor" name="vendedor" required>
                            </div>
                        </div>
                 
             
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <label for="alto" class="form-label fw-bold">Alto (IN): *</label>
                                <input type="text" class="form-control" id="alto" name="alto" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="ancho" class="form-label fw-bold">ancho (IN): *</label>
                                <input type="text" class="form-control" id="ancho" name="ancho" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="profundidad" class="form-label fw-bold">Profundidad (IN): *</label>
                                <input type="text" class="form-control" id="profundidad" name="profundidad" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="lb_vol" class="form-label fw-bold">lb/vol: *</label>
                                <input type="text" class="form-control" id="lb_vol" name="lb_vol" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="lb_vol_total" class="form-label fw-bold">lb/vol Total: *</label>
                                <input type="text" class="form-control input_total" id="lb_vol_total" name="lb_vol_total" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="pesoNeto" class="form-label fw-bold">Peso Unidad LB: *</label>
                                <input type="number" class="form-control" id="pesoNeto" name="pesoNeto" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="precioUnitario" class="form-label text-muted">Precio Unitario $:</label>
                                <input type="number" class="form-control bg-white" id="precioUnitario" name="precioUnitario">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="pesoNetoTotal" class="form-label fw-bold">Peso Neto Total LB: *</label>
                                <input type="number" class="form-control input_total" id="pesoNetoTotal" name="pesoNetoTotal" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="precioTotal" class="form-label fw-bold">Precio Total $: *</label>
                                <input type="number" class="form-control input_total" id="precioTotal" name="precioTotal" required>
                            </div>
                        </div>
                    </div>

                    <!-- Campos Informativos -->
                    <div class="border p-3 rounded bg-light">
                        <h5 class="mb-3 text-secondary">Información Adicional</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="codigoNR2" class="form-label fw-bold">Código NR 2: *</label>
                                <input type="text" class="form-control" id="codigoNR2" name="codigoNR2" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="semanas" class="form-label text-muted">Código Internacional:</label>
                                <input type="number" class="form-control bg-white" id="semanas" name="semanas">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cantidad" class="form-label text-muted">Codigo parte:</label>
                                <input type="number" class="form-control bg-white" id="cantidad" name="cantidad">
                            </div>
                        </div>
                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>




 <!-- Modal calculo de volumne -->
 <div class="modal fade" id="medicionesModal" tabindex="-1" aria-labelledby="medicionesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="medicionesModalLabel" style="color: black;">Tabla de Mediciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" class="table-header align-middle"></th>
                                <th colspan="2" class="table-header">PESO</th>
                                <th colspan="2" class="table-header">LARGO</th>
                                <th colspan="2" class="table-header">ANCHO</th>
                                <th colspan="2" class="table-header">ALTO</th>
                                <th colspan="2" class="table-header">VOLUME</th>
                                <th rowspan="2" class="table-header align-middle">lb/vol</th>
                                <th rowspan="2" class="table-header align-middle">Kg/Vol</th>
                            </tr>
                            <tr>
                                <th class="table-header">libras</th>
                                <th class="table-header">kilos</th>
                                <th class="table-header">in</th>
                                <th class="table-header">cm</th>
                                <th class="table-header">in</th>
                                <th class="table-header">cm</th>
                                <th class="table-header">in</th>
                                <th class="table-header">cm</th>
                                <th class="table-header">ft³</th>
                                <th class="table-header">m³</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td class="text-center">1</td>
                                <td class="editable-cell">
                                    <input type="number" id="peso_lb_1" class="form-control-sm" step="0.01"  >
                                </td>
                                <td class="readonly-cell">
                                    <input type="text" id="peso_kg_1" class="form-control-sm" readonly >
                                </td>
                                <td class="editable-cell">
                                    <input type="number" id="largo_in_1" class="form-control-sm" step="0.1" >
                                </td>
                                <td class="readonly-cell">
                                    <input type="text" id="largo_cm_1" class="form-control-sm" readonly >
                                </td>
                                <td class="editable-cell">
                                    <input type="number" id="ancho_in_1" class="form-control-sm" step="0.1" >
                                </td>
                                <td class="readonly-cell">
                                    <input type="text" id="ancho_cm_1" class="form-control-sm" readonly >
                                </td>
                                <td class="editable-cell">
                                    <input type="number" id="alto_in_1" class="form-control-sm" step="0.1" >
                                </td>
                                <td class="readonly-cell">
                                    <input type="text" id="alto_cm_1" class="form-control-sm" readonly >
                                </td>
                                <td class="readonly-cell">
                                    <input type="text" id="volumen_ft_1" class="form-control-sm" readonly >
                                </td>
                                <td class="readonly-cell">
                                    <input type="text" id="volumen_m_1" class="form-control-sm" readonly >
                                </td>
                                <td class="readonly-cell">
                                    <input type="text" id="lb_vol_1" class="form-control-sm" readonly >
                                </td>
                                <td class="readonly-cell">
                                    <input type="text" id="kg_vol_1" class="form-control-sm" readonly >
                                </td>
                            </tr>
                            {{-- <tr class="special-row">
                                <td class="text-center">1</td>
                                <td class="special-cell">25.63</td>
                                <td class="special-cell">11.65</td>
                                <td colspan="6"></td>
                                <td class="special-cell">2.25</td>
                                <td class="special-cell">0.06</td>
                                <td class="special-cell">23.42</td>
                                <td class="special-cell">12.74</td>
                            </tr> --}}
                            <!-- Puedes agregar más filas según sea necesario -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="abrirModalCalculo()">Siguiente</button>
            </div>
        </div>
    </div>
</div>
</div>

@endsection



@section('scripts')
<script>
        function updateProgress(currentStep) {
            const totalSteps = 4;
            const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
            $('#progressLine').css('width', `${progress}%`);

            // Actualizar estados de los pasos
            $('.step').each(function() {
                const stepNum = $(this).data('step');
                $(this).removeClass('active completed');
                if (stepNum === currentStep) {
                    $(this).addClass('active');
                } else if (stepNum < currentStep) {
                    $(this).addClass('completed');
                }
            });
        }

        function showStep(step) {
            $('.card').removeClass('active');
            $(`.card[data-step="${step}"]`).addClass('active');
            updateProgress(step);
        }

        function nextStep(currentStep) {
            showStep(currentStep + 1);
        }

        function prevStep(currentStep) {
            showStep(currentStep - 1);
        }

        $(document).ready(function() {
            // Manejar el envío del formulario
            $('#importOrderForm').on('submit', function(e) {
                e.preventDefault();
                
                // Validar campos requeridos
                let isValid = true;
                $(this).find('[required]').each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if (!isValid) {
                    alert('Por favor complete todos los campos requeridos');
                    return;
                }

                // Recoger datos del formulario
                const formData = new FormData(this);
                
                // Convertir FormData a objeto para mostrar en consola
                const formDataObj = {};
                formData.forEach((value, key) => {
                    if (key === 'documentos') {
                        formDataObj[key] = Array.from(value).map(file => file.name);
                    } else {
                        formDataObj[key] = value;
                    }
                });

                // Aquí iría el código para enviar los datos al servidor
                //console.log('Datos del formulario:', formDataObj);
                //alert('Formulario enviado correctamente');
            });

            // Calcular fecha tentativa al cambiar semanas de demora
            $('#semanasDemora').on('change', function() {
                const fechaOrden = $('#fecha').val();
                if (fechaOrden && $(this).val()) {
                    const fecha = new Date(fechaOrden);
                    fecha.setDate(fecha.getDate() + ($(this).val() * 7));
                    $('#fechaTentativa').val(fecha.toISOString().split('T')[0]);
                }
            });
        });
</script>

<script>




    var table = $('#table-producto').DataTable({
        columnDefs: [
        { width: "100px", targets: 0 } // Ajusta el ancho de la primera columna (índice 0)
    ],
    fixedColumns: true, // Si deseas que la columna sea fija
    autoWidth: false // Desactiva el ajuste automático de ancho
    });
    $('#addProduct').click(function() {
    let newRow = table.row.add([
        `<div class="d-flex align-items-center" style="width: 160px; max-width:160px;">
            <select class="form-control producto" name="producto" style="width: 130px;">
            </select>
            <button class="btn btn-info btn-sm ms-1 buscarProducto" title="Buscar producto">
                <i class="fa-solid fa-search"></i>
            </button>
        </div>`,
        `<input type="number" class="form-control semanas" name="semanas" style="width: 35px; max-width:35px;">`,
        `<input type="text" class="form-control pro_descripcion" name="pro_descripcion" readonly>`,
        `<input type="text" class="form-control cod_cliente" name="cod_cliente" readonly>`,
        `<input type="text" class="form-control uni_medida" name="uni_medida" readonly>`, 
        `<input type="number" class="form-control cantidad" name="cantidad" style="width: 45px; max-width:45px;">`,
        `<input type="text" class="form-control precio" name="precio" style="width: 80px; max-width:80px;">`,
        `<div class="d-flex">
            <button class="btn btn-primary btn-sm viewRow me-2"><i class="fa-solid fa-eye"></i></button>
            <button class="btn btn-danger btn-sm deleteRow"><i class="fa-solid fa-trash"></i></button>
        </div>`
    ]).draw(false).node(); // Importante: obtener el nodo de la fila agregada

    // Inicializar Select2 en la fila (mantenemos esto para compatibilidad)
    let selectElement = $(newRow).find('.producto');
    selectElement.select2({
        placeholder: "Seleccione un producto",
        width: 'resolve',
        ajax: {
            url: '/productos/select2',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });

    // Función para abrir la ventana de búsqueda con Alertify
    $(newRow).find('.buscarProducto').on('click', function() {
        // Referencia a la fila actual
        let currentRow = $(this).closest('tr');
        
        // Crear contenido para el modal
        let contenidoModal = `
            <div>
                <div class="mb-3">
                    <label for="modalProductSelect" class="form-label">Buscar producto:</label>
                    <select id="modalProductSelect" class="form-control" style="width: 100%;"></select>
                </div>
                <div id="productoDetalles" class="mt-3" style="display: none;">
                    <h5>Detalles del producto</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Código interno Cliente:</strong> <span id="detalle-codigo"></span></p>
                            <p><strong>Descripción:</strong> <span id="detalle-descripcion"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Unidad de medida:</strong> <span id="detalle-unidad"></span></p>
                            <p><strong>Precio:</strong> <span id="detalle-precio"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Crear y configurar el modal con Alertify
        alertify.alert()
            .setting({
                'title': 'Buscar Producto',
                'label': 'Seleccionar',
                'message': contenidoModal,
                'onok': function() {
                    // Obtener el producto seleccionado
                    let selectedProduct = $('#modalProductSelect').select2('data')[0];
                    if (selectedProduct) {
                        // Actualizar el select en la fila
                        let option = new Option(selectedProduct.text, selectedProduct.id, true, true);
                        currentRow.find('.producto').html('').append(option).trigger('change');
                    }
                },
                'resizable': true,
                'maximizable': true,
                'padding': true
            }).show();
        
        // Personalizar el tamaño del modal
        $('.ajs-dialog').css({
            'width': '80%',
            'max-width': '800px',
            'height': 'auto',
            'min-height': '400px'
        });
        
        // Inicializar Select2 en el modal
        $('#modalProductSelect').select2({
            placeholder: "Busque un producto por nombre, código o descripción",
            width: '100%',
            dropdownParent: $('.ajs-dialog'),
            ajax: {
                url: '/productos/select2',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            templateResult: formatProducto,
            templateSelection: formatProductoSelection
        });
        
        // Evento para mostrar detalles cuando se selecciona un producto
        $('#modalProductSelect').on('select2:select', function(e) {
            let productoId = e.params.data.id;
            
            // Obtener detalles adicionales del producto
            $.ajax({
                url: '/productos/info/' + productoId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        // Mostrar los detalles en el modal
                        $('#detalle-codigo').text(data.producto.PRO_CODE_INTERNO_CLIENTE || 'N/A');
                        $('#detalle-descripcion').text(data.producto.PRO_DESCRIPCION || 'N/A');
                        $('#detalle-unidad').text(data.unidad_medida.UNI_NOMBRE || 'N/A');
                        $('#detalle-precio').text(data.precio || 'N/A');
                        $('#productoDetalles').show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error al obtener detalles del producto:", error);
                    $('#productoDetalles').hide();
                }
            });
        });
    });

    // Función para formatear los resultados en el select
    function formatProducto(producto) {
        console.log(producto);
        if (!producto.id) return producto.text;
        
        // Crear un contenedor más amplio con estilos para mostrar información detallada
        return $(
            '<div class="d-flex flex-column p-2">' +
                '<div class="fw-bold fs-5">' + producto.text + '</div>' +
                '<div class="d-flex justify-content-between mt-1">' +
                    '<div><span class="text-muted">N° Parte:</span> ' + (producto.PRO_CODE_PARTE || 'N/A') + '</div>' +
                    '<div><span class="text-muted">Código interno cliente:</span> ' + (producto.codigo || 'N/A') + '</div>' +
                    (producto.precio ? '<div><span class="text-muted">Precio:</span> $' + producto.precio + '</div>' : '') +
                '</div>' +
                (producto.descripcion ? '<div class="text-wrap mt-1">' + producto.descripcion + '</div>' : '') +
            '</div>'
        );
    }

    // Función para formatear el item seleccionado
    function formatProductoSelection(producto) {
        return producto.text || producto.id;
    }
      
    // Mantener el evento para detectar cambios en el select y hacer AJAX
    selectElement.on('change', function() {
        let productoId = $(this).val(); // Obtener el ID del producto seleccionado
        let row = $(this).closest('tr'); // Obtener la fila actual
       
        if (productoId) {
            $.ajax({
                url: '/productos/info/' + productoId, // Ruta en Laravel para obtener la info
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        row.find('.code_cope').val(data.producto.PRO_CODE_COPE);
                        row.find('.cod_cliente').val(data.producto.PRO_CODE_INTERNO_CLIENTE);
                        let fullDescription = data.producto.PRO_DESCRIPCION || '';
                        let shortDescription = fullDescription.length > 50 ? 
                                            fullDescription.substring(0, 50) + '...' : 
                                            fullDescription;

                        row.find('.pro_descripcion')
                        .val(shortDescription)
                        .attr('title', fullDescription);
                        row.find('.uni_medida').val(data.unidad_medida.UNI_NOMBRE);
                        row.find('.cantidad').val(1); // Puedes ajustar el valor inicial
                        row.find('.semanas').val(data.producto.PRO_SEMANAS_ENTREGA); // Puedes ajustar el valor inicial
                        row.find('.precio').val(data.precio);
                        arrayProductosTable.push(data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error al obtener la información del producto:", error);
                }
            });
        }
    });

    // Add click handler for the view button
    $(newRow).find('.viewRow').on('click', function() {
        const row = $(this).closest('tr');
        let productoId = row.find('.producto').val();
        
        var producto = arrayProductosTable.filter( v => v.producto.PRO_ID == productoId)[0];
        
        $("#origen").val($("#idPaisOrigen").find(':selected').text());
        $("#destino").val($("#idPaisDestino").find(':selected').text());
        $("#vendedor").val($("#idProveedor").find(':selected').text());
        var alto = parseFloat(producto.producto.PRO_ALTO);
        var ancho = parseFloat(producto.producto.PRO_ANCHO);
        var profundidad = parseFloat(producto.producto.PRO_PROFUNDIDAD);
        $("#alto").val(numeral(alto ).format('0.00'));
        $("#ancho").val(numeral(ancho).format('0.00'));
        $("#profundidad").val(numeral(profundidad ).format('0.00'));
        var pre_vol = (alto * ancho * profundidad);
        $("#lb_vol").val(numeral( pre_vol/ 166).format('0.00'));
        
        $("#lb_vol_total").val((  numeral(pre_vol / 166*row.find('.cantidad').val()).format('0.00')));
        $("#marca").val("Marca 1");
        $("#pesoNeto").val(numeral(producto.producto.PRO_PESO).format('0.00'));
        $("#pesoNetoTotal").val(numeral(producto.producto.PRO_PESO * row.find('.cantidad').val()).format('0.00'));
        
        $("#precioTotal").val(numeral(row.find('.precio').val() * row.find('.cantidad').val()).format('0.00'));
        $("#precioUnitario").val(row.find('.precio').val());
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('formModal'));
        modal.show();
    });

    // Add click handler for delete button
    $(newRow).find('.deleteRow').on('click', function() {
        table.row($(this).closest('tr')).remove().draw();
    });
});


function existeValorEnDataTable( selectValue) {
   
    if (!selectValue) {
        return false;
    }
    
    // Contador para verificar repeticiones
    let contador = 0;
    
    // Buscar el valor en las filas
    table.rows().every(function() {
        const $fila = $(this.node());
        const $select = $fila.find('.producto');
        
        if ($select.length > 0 && $select.val() === selectValue) {
            contador++;
            
            // Si encontramos más de una coincidencia, está repetido
            if (contador > 1) {
                return false; // Detener el bucle
            }
        }
    });
    
    console.log(`El valor ${selectValue} aparece ${contador} veces`);
    
    // Si el contador es mayor a 1, el valor está repetido
    return contador > 1;
}


var arrayProductosTable = [];


var idProducto;
var inputsArrayProducto = [];// Array global para almacenar los productos
var totalPrecio;
var productoInfo;
var TotalCantidad;
var totalPeso_kg;
function obtenerDatosModal() {
    let inputsArray = [];

    // Recorre cada fila dentro del modal
    $("#viewRowModal .row").each(function() {
        let rowData = {
            label: $(this).find("label").text().trim(), // Obtiene el texto de la etiqueta
            inputs: []
        };

        // Recorre cada input dentro de la fila y almacena su id y valor
        $(this).find("input").each(function() {
            let inputData = {
                id: $(this).attr("id") || "", // ID del input
                value: $(this).val() || "" // Valor del input
            };
            rowData.inputs.push(inputData);
        });

        inputsArray.push(rowData);
    });
    totalPrecio = $("#TotalSalesPrice").text();
    TotalCantidad = $("#items").val();
    totalPeso_kg = $("#totalPeso_kg").val();
    $(".col-data-1").val("");
    $(".col-data-2").val("");
    $(".col-data-3").val("");

    return inputsArray;
}






// Guardar datos cuando el modal se cierra
$('#viewRowModal').on('hidden.bs.modal', function() {
    
    obtenerDatosFormulario($("#calculo_idProveedor").val(),$("#calculo_semana").val());
    $("#peso_lb_1").val("");
    $("#peso_kg_1").val("");
    $("#largo_in_1").val("");
    $("#largo_cm_1").val("");
    $("#ancho_in_1").val("");
    $("#ancho_cm_1").val("");
    $("#alto_cm_1").val("");
    $("#volumen_ft_1").val("");
    $("#volumen_m_1").val("");
    $("#lb_vol_1").val("");
    $("#kg_vol_1").val("");
    $("#alto_in_1").val("");
    
    
    
});

// Guardar datos cuando el modal se cierra
$('#modalDhl').on('hidden.bs.modal', function() {
    
    obtenerDatosFormulario($("#calculo_idProveedor").val(),$("#calculo_semana").val(),false);
    
});


function enviarCotizacion(){

    console.log(arrayProductosMargen);
$.ajax({
    url: "/Cotizacion",
    method: "POST",
    data: JSON.stringify({ cotizaciones: arrayProductosMargen,id_cliente:$("#idCliente").val() }), // Enviamos como JSON
    contentType: "application/json",
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") // Importante para Laravel
    },
    xhrFields: {
        responseType: "blob" // Para recibir el PDF como archivo
    },
    success: function (response) {
        const url = window.URL.createObjectURL(response);
        const a = document.createElement("a");
        a.href = url;
        a.download = "cotizacion.pdf";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    },
    error: function (xhr, status, error) {
        console.error("Error al generar el PDF:", error);
    }
});
}

$(".paso2").on('click', function() {

    actualizarTablaResumen();
});


// Para obtener el total general
function obtenerTotalGeneral() {
    let datosAgrupados = agruparDatosTabla();
    return datosAgrupados.reduce((sum, grupo) => sum + grupo.totalPrecio, 0);
}

// Para obtener un resumen por proveedor específico
function obtenerResumenProveedor(idProveedorBuscado) {
    let datosAgrupados = agruparDatosTabla();
    var ids = idProveedorBuscado.toString();
    return datosAgrupados.filter(grupo => grupo.idProveedor === ids);
}


function agruparDatosTabla() {
    let datosAgrupados = {};
    
    // Recorrer todas las filas de la DataTable
    table.rows().every(function() {
        let $row = $(this.node());
        
        // Obtener los valores clave para agrupación
        let semanas = $row.find('.semanas').val();
        let idProveedor = $('#idProveedor').val();
        
        // Crear una clave única para el grupo
        let key = `${idProveedor}-${semanas}`;
        
        // Si no existe el grupo, crearlo
        if (!datosAgrupados[key]) {
            datosAgrupados[key] = {
                idProveedor: idProveedor,
                semanas: semanas,
                productos: []
            };
        }
        
        // Agregar los datos del producto al grupo
        datosAgrupados[key].productos.push({
            producto: $row.find('.producto').val(),
            code_cope: $row.find('.code_cope').val(),
            cod_cliente: $row.find('.cod_cliente').val(),
            uni_medida: $row.find('.uni_medida').val(),
            cantidad: parseFloat($row.find('.cantidad').val()) || 0,
            info : arrayProductosTable.filter( v => v.producto.PRO_ID == $row.find('.producto').val())[0],
            precio: parseFloat($row.find('.precio').val()) || 0,
            semanas: parseFloat($row.find('.semanas').val()) || 0,
            cif_valor : 0, // Valor inicial
            sales_factor : 0, // Valor inicial
            AD_VALOREM : 0, // Valor inicial
            AD_VALOREM_TOTAL : 0,      // TOTAL AD/VALOREM
            precio_uni : 0,
            precio_uni_total : 0,
            unidad_make_up : 0,
            unidad_make_up_total : 0,
            sale_sale : 0,
            sale_sale_total : 0,
            rango_dias : "",
        });
    });

    // Convertir el objeto a array y calcular totales
    let resultado = Object.values(datosAgrupados).map(grupo => {
        // Calcular totales por grupo
        let totalCantidad = grupo.productos.reduce((sum, prod) => sum + prod.cantidad, 0);
        let totalPrecio = grupo.productos.reduce((sum, prod) => sum + (prod.cantidad * prod.precio), 0);
        
        return {
            ...grupo,
            totalCantidad,
            totalPrecio
        };
    });

    return resultado;
}


var arrayProductosMargen= [];
function actualizarTablaResumen() {
    let datosAgrupados = agruparDatosTabla();
    let tablaResumen = $('#table-resumen').DataTable();
    
    // Limpiar la tabla
    tablaResumen.clear();
    
    // Agrupar por proveedor
    let groupByProveedor = {};
    datosAgrupados.forEach(grupo => {
        if (!groupByProveedor[grupo.idProveedor]) {
            groupByProveedor[grupo.idProveedor] = {
                semanas: {},
                totalCantidad: 0,
                totalValor: 0,
                totalDensidad:0,
                totalPeso: 0
            };
        }
        
        // Agrupar por semanas dentro de cada proveedor
        if (!groupByProveedor[grupo.idProveedor].semanas[grupo.semanas]) {
            groupByProveedor[grupo.idProveedor].semanas[grupo.semanas] = {
                productos: [],
                subtotalCantidad: 0,
                subtotalValor: 0,
                subtotal_lb_vol:0,
                subtotalPeso: 0,
                
                
            };
        }
        
        // Agregar productos a la semana correspondiente
        grupo.productos.forEach(producto => {
            let valorTotal = producto.cantidad * producto.precio;
            groupByProveedor[grupo.idProveedor].semanas[grupo.semanas].productos.push({
                ...producto,
                valorTotal
            });
            
            // Actualizar subtotales de la semana
            groupByProveedor[grupo.idProveedor].semanas[grupo.semanas].subtotalCantidad += parseFloat(producto.cantidad) || 0;
            groupByProveedor[grupo.idProveedor].semanas[grupo.semanas].subtotalValor += valorTotal;
            groupByProveedor[grupo.idProveedor].semanas[grupo.semanas].subtotalPeso += parseFloat(producto.cantidad * producto.info.producto.PRO_PESO) || 0;
            groupByProveedor[grupo.idProveedor].semanas[grupo.semanas].subtotal_lb_vol += ((parseFloat(producto.info.producto.PRO_ANCHO)*parseFloat(producto.info.producto.PRO_ALTO)*parseFloat(producto.info.producto.PRO_PROFUNDIDAD))/166 *parseFloat(producto.cantidad));
            groupByProveedor[grupo.idProveedor].semanas[grupo.semanas].calculo ={};
            // Actualizar totales del proveedor
            groupByProveedor[grupo.idProveedor].totalCantidad += parseFloat(producto.cantidad) || 0;
            groupByProveedor[grupo.idProveedor].totalValor += valorTotal;
            groupByProveedor[grupo.idProveedor].totalPeso += parseFloat(producto.cantidad * producto.info.producto.PRO_PESO) || 0;
        });
    });
   
    var resumenTotalMonto =0;
    var resumentTotalPeso = 0;
    var resuemtnItems = 0;
    inputsArrayProducto = groupByProveedor;
    console.log(inputsArrayProducto);
    
    // Actualizar la tabla con los datos de prueba
    updateTableData(inputsArrayProducto);

    // Actualizar el array de productos margen
    actualizarArrayProductosMargen(inputsArrayProducto);
    return;

}


function convertirLibrasAKilos(libras) {
    return libras * 0.453592;
}

function calcularDensidad(pesoLb, altoPulg, anchoPulg, profundidadPulg) {
    // Convertir pulgadas a pies
    let altoFt = altoPulg / 12;
    let anchoFt = anchoPulg / 12;
    let profundidadFt = profundidadPulg / 12;

    // Calcular volumen en pies cúbicos
    let volumenFt3 = altoFt * anchoFt * profundidadFt;

    // Evitar división por cero
    if (volumenFt3 === 0) {
        return "El volumen no puede ser cero.";
    }

    // Calcular densidad en lb/ft³
    let densidadLbFt3 = pesoLb / volumenFt3;

    // Convertir lb/ft³ a kg/m³
    let densidadKgM3 = densidadLbFt3 * 16.0185;

    return {
        lb_ft3: densidadLbFt3.toFixed(2),  // Densidad en lb/ft³
        kg_m3: densidadKgM3.toFixed(2)     // Densidad en kg/m³
    };
}

// Función auxiliar para formatear números
function formatNumber(num) {
    var formato = new Intl.NumberFormat('es-ES', {
        useGrouping: true,
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
        notation: "standard"
    });


    
  return formato.format(num);
    
}

var adValorenTotal = 0;
function setCifValue(idProveedor, semanasString){
    adValorenTotal = 0;
    const semanas = semanasString.split(',').map(s => s.trim());
    // Sumar los valores de todas las semanas
    semanas.forEach(semana => {
        if (inputsArrayProducto[idProveedor].semanas[semana]) {
            const calculoSemana = inputsArrayProducto[idProveedor].semanas[semana];
            
            // Agregar productos de esta semana al array de productos
            if (calculoSemana.productos) {
                var totalPro =0; 
                console.log(calculoSemana);
                calculoSemana.productos.forEach(producto =>{
                    producto.cif_valor = parseFloat($("#CifFactor2").text());
                    var precio = parseFloat(producto.info.producto.PRO_PRECIO);
                    var cifValor = parseFloat(producto.cif_valor);
                    var aranceles = parseFloat(producto.info.producto.PRO_ARANCELES) / 100;
                    var cantidad = parseFloat(producto.cantidad);
                    console.log(precio,cifValor,aranceles,cantidad);
                    var resultado = (precio * cifValor * aranceles * cantidad).toFixed(2);
                    console.log(resultado);
                    adValorenTotal += resultado;

                });
            }


            
        }
    });
    console.log(parseFloat(adValorenTotal));
    return parseFloat(adValorenTotal);
    
}



function viewModalCalculo(idProveedor, semanasString) {
    // Convertir el string de semanas a array
    const semanas = semanasString.split(',').map(s => s.trim());
    
    // Inicializar totales
    let totales = {
        subtotalValor: 0,
        subtotalPeso: 0,
        subtotal_lb_vol: 0,
        subtotalCantidad: 0,

        productos: []
    };

    // Sumar los valores de todas las semanas
    semanas.forEach(semana => {
        if (inputsArrayProducto[idProveedor].semanas[semana]) {
            const calculoSemana = inputsArrayProducto[idProveedor].semanas[semana];
            totales.subtotalValor += calculoSemana.subtotalValor || 0;
            totales.subtotalPeso += calculoSemana.subtotalPeso || 0;
            totales.subtotal_lb_vol += calculoSemana.subtotal_lb_vol || 0;
            totales.subtotalCantidad += calculoSemana.subtotalCantidad || 0;
            asignarValoresAFormularios(calculoSemana.calculo);
            // Agregar productos de esta semana al array de productos
            if (calculoSemana.productos) {
                totales.productos = [...totales.productos, ...calculoSemana.productos];
                // console.log(calculoSemana);
            }
            
        }
    });

    

    // Establecer valores en el modal
    $("#calculo_idProveedor").val(idProveedor);
    $("#calculo_semana").val(semanasString);

    // Mostrar las semanas en el modal
    $("#semanas_seleccionadas").text("Semanas incluidas: " + semanas.sort((a,b) => a-b).join(", "));
   
    const mayor = Math.max(...semanas.map(Number));
    $(".DeliveryET").val(mayor*7);
    $(".DeliveryE").val(mayor);
    
    

    // Buscar productos guardados para todas las semanas
    let productosGuardados = arrayProductosMargen.filter(prod => 
        prod.calculo && 
        prod.calculo["calculo_idProveedor"] == idProveedor && 
        semanas.includes(prod.calculo["calculo_semana"])
    );


    // Si hay productos guardados, usar el últ  imo
    if (productosGuardados.length > 0) {
        // limpiarTodosLosFormularios();
        
        // asignarValoresAFormularios(productosGuardados[0].calculo.inputs);
    }

    // Mostrar los totales calculados
    $("#merchandiseValue").val(numeral(totales.subtotalValor).format('0,0.00'));

    // // Peso Neto
    $(".weightNLB").val(numeral(totales.subtotalPeso).format('0.00'));

   
   
    // Cantidad de items
    $(".itemsV").val(totales.subtotalCantidad);



    // Mostrar el modal
    // var modal2 = new bootstrap.Modal(document.getElementById('viewRowModal'));
    var modal2 = new bootstrap.Modal(document.getElementById('medicionesModal'));
    modal2.show();
}


$( "#peso_lb_1" ).on( "change", function() {
    $("#peso_kg_1").val(numeral(($(this).val()/2.2)).format('0.00'));
} );
$( "#largo_in_1" ).on( "change", function() {
    $("#largo_cm_1").val(numeral(($(this).val()*2.54)).format('0.00'));
} );
$( "#ancho_in_1" ).on( "change", function() {
    $("#ancho_cm_1").val(numeral(($(this).val()*2.54)).format('0.00'));
} );
$( "#alto_in_1" ).on( "change", function() {
    $("#alto_cm_1").val(numeral(($(this).val()*2.54)).format('0.00'));
} );

function recalcularPrimeraLinea() {
    // var peso_lb = parseFloat($("#peso_lb_1").val()) || 0;
    var largo = parseFloat($("#largo_in_1").val()) || 0;
    var ancho = parseFloat($("#ancho_in_1").val()) || 0;
    var alto  = parseFloat($("#alto_in_1").val())  || 0;

 
    var volumen_m3 = (largo / 12) * (ancho / 12) * (alto / 12);
    var resultado =  volumen_m3;

    $("#volumen_ft_1").val(numeral(resultado).format('0.00'));

    var lb_vol_1 = ((largo ) * (ancho ) * (alto ))/166;
    $(".wvklbft3").val(numeral(lb_vol_1).format('0.00'));
    $("#lb_vol_1").val(numeral(lb_vol_1).format('0.00'));

    // $(".weightNLB").val(numeral(lb_vol_1).format('0.00'));
    $(".weightNKG").val(numeral((lb_vol_1/2.2)).format('0.000'));
    $(".weightBL").val(numeral((lb_vol_1/0.65)).format('0.000'));
    
}

$("#largo_in_1, #ancho_in_1, #alto_in_1").on("change keyup", function () {
    recalcularPrimeraLinea();
    recalcularPrimeraLineaCm();
    
    
});

$("#alto_cm_1, #ancho_cm_1, #largo_cm_1").on("change keyup", function () {
    recalcularPrimeraLineaCm();
});

function recalcularPrimeraLineaCm(){
    var largo = parseFloat($("#alto_cm_1").val()) || 0;
    var ancho = parseFloat($("#ancho_cm_1").val()) || 0;
    var alto  = parseFloat($("#largo_cm_1").val())  || 0;

    // var peso_kg = peso_lb / 2.2;
    var volumen_m3 = (largo / 100) * (ancho / 100) * (alto / 100);
    var resultado =  volumen_m3;

    $("#volumen_m_1").val(numeral(resultado).format('0.00'));

    var kg_vol_1 = (largo*ancho*alto)/5000;
    $("#kg_vol_1").val(numeral(kg_vol_1).format('0.00'));
    $(".wvkgm3").val(numeral(kg_vol_1).format('0.00'));
    $(".weightBKT").val(numeral(kg_vol_1).format('0.00'));
    
    
}

function abrirModalCalculo(){

    $('#medicionesModal').modal('hide');
   
    var modal2 = new bootstrap.Modal(document.getElementById('viewRowModal'));
    modal2.show();
}




function limpiarTodosLosFormularios() {
    // Limpiar todos los inputs con clase name_
    $('input[class*="name_"]').each(function() {
        const $input = $(this);
        
        // No limpiar inputs deshabilitados con valor "Quote"
        if ($input.prop('disabled') && $input.val() === "Quote") {
            return;
        }
        
        // Si es un input numérico (type="number"), establecer a 0
        if ($input.attr('type') === 'number') {
            $input.val(0);
        } else {
            // Para otros tipos de inputs, establecer a cadena vacía
            $input.val('');
        }
    });
    
    // Limpiar etiquetas con id que sean totales o subtotales
    $('label[id][class*="name_"]').each(function() {
        $(this).text('');
    });
    
    console.log("Todos los formularios han sido limpiados");
}


function asignarValoresAFormularios(datos) {
    // Si datos es un string JSON, convertirlo a objeto
    if (typeof datos === 'string') {
        try {
            datos = JSON.parse(datos);
        } catch (e) {
            console.error("Error al parsear los datos JSON:", e);
            return false;
        }
    }
    
    // Verificar que datos sea un objeto
    if (typeof datos !== 'object' || datos === null) {
        console.error("Los datos proporcionados no son válidos");
        return false;
    }
    
    // Iterar a través de cada sección de datos
    for (const seccion in datos) {
        const seccionDatos = datos[seccion];
        
        // Iterar a través de cada campo en la sección
        for (const nombreClase in seccionDatos) {
            const datosCampo = seccionDatos[nombreClase];
            
            // Buscar el elemento por clase
            const $elemento = $(`.${nombreClase}`);
            
            if ($elemento.length > 0) {
                // Si encontramos el elemento
                if (datosCampo.type === 'label') {
                    // Si es una etiqueta
                    if ($elemento.attr('id')) {
                        $(`#${$elemento.attr('id')}`).text(datosCampo.value);
                    }
                } else {
                    // Si es un input
                    $elemento.val(datosCampo.value);
                }
            }
        }
    }
    
    console.log("Valores asignados correctamente a los formularios");
    return true;
}


    function convertirLbFt3aKgM3(valorLbFt3) {
        return valorLbFt3 * 16.0185;
    }

    var table_margen = $('#table_margen').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthMenu": [5, 10, 25, 50, 100],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron registros",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });

        $( ".pasomargen" ).on( "click", function() {
                    productoMargen()
        } );



        // Función productoMargen actualizada
function productoMargen() {
    // Limpiar tabla
    if (table_margen) {
        table_margen.clear();
    }

    // Agrupar productos por code_cope
    let productosAgrupados = {};
    console.log("Arrat de productos margen ", arrayProductosMargen);
    // Primero, calculamos todos los valores para cada producto en arrayProductosMargen
    arrayProductosMargen.forEach(producto => {
        // Cálculos financieros para cada producto individual
        var cif_value = redondearDosDecimales(producto.cif_valor * producto.info.producto.PRO_PRECIO);
        var AD_VALOREM = redondearDosDecimales(cif_value * (producto.info.producto.PRO_ARANCELES/100));
        var ddp_precio_uni = redondearDosDecimales(producto.sales_factor * producto.info.producto.PRO_PRECIO + AD_VALOREM);
        var unidad_make_up = redondearDosDecimales((producto.info.producto.PRO_MARGEN/100) * producto.info.producto.PRO_PRECIO);
        var sale_sale = parseFloat(unidad_make_up) + parseFloat(ddp_precio_uni);
        
        // Asignar valores calculados a cada producto en el array original
        producto.AD_VALOREM = AD_VALOREM;
        producto.AD_VALOREM_TOTAL = redondearDosDecimales(AD_VALOREM * producto.cantidad);
        producto.unidad_make_up = unidad_make_up;
        producto.unidad_make_up_total = redondearDosDecimales(unidad_make_up * producto.cantidad);
        producto.sale_sale = sale_sale;
        producto.sale_sale_total = redondearDosDecimales(sale_sale * producto.cantidad);
        producto.cif_value = cif_value;
        producto.precio_uni = ddp_precio_uni;
        producto.precio_uni_total = redondearDosDecimales(ddp_precio_uni * producto.cantidad);
        
        // Agrupamiento por code_cope para la visualización en tabla
        const codeKey = producto.producto;
        
        if (!productosAgrupados[codeKey]) {
            productosAgrupados[codeKey] = {
                ...producto,
                cantidad: 0,
                semanasArray: []
            };
        }

        // Sumar cantidad
        productosAgrupados[codeKey].cantidad += producto.cantidad;

        // Recolectar semanas
        if (producto.semanasAgrupadas && producto.semanasAgrupadas.length > 0) {
            productosAgrupados[codeKey].semanasArray = [
                ...productosAgrupados[codeKey].semanasArray,
                ...producto.semanasAgrupadas
            ];
        }
        if (producto.semanas) {
            productosAgrupados[codeKey].semanasArray.push(producto.semanas.toString());
        }
    });
    console.log("Productos Agrupados", productosAgrupados);
    // Procesar productos agrupados para la visualización
    Object.values(productosAgrupados).forEach(producto => {
        // Eliminar duplicados y ordenar semanas
        producto.semanasArray = [...new Set(producto.semanasArray)]
            .sort((a, b) => parseInt(a) - parseInt(b));

        // Calcular semana máxima
        const maxSemana = Math.max(...producto.semanasArray.map(s => parseInt(s)));

        // Crear fila para la tabla
        let nuevaFila = [
            producto.info.producto.PRO_PARTIDA,
            producto.info.producto.PRO_HS_CODIGO,
            redondearDosDecimales(producto.info.producto.PRO_ARANCELES) + "%",
            producto.cif_value,
            producto.AD_VALOREM,
            producto.AD_VALOREM_TOTAL,
            producto.precio_uni,
            producto.precio_uni_total,
            producto.info.producto.PRO_MARGEN,
            formatoDolares(producto.unidad_make_up),
            formatoDolares(producto.unidad_make_up_total),
            formatoDolares(producto.sale_sale),
            formatoDolares(producto.sale_sale_total),
            producto.rango_dias
        ];

        // Agregar fila a la tabla
        if (table_margen) {
            table_margen.row.add(nuevaFila);
        }
    });

    // Redibujar tabla
    if (table_margen) {
        table_margen.draw();
    }
    
    // console.log("Array de productos con márgenes actualizado:", arrayProductosMargen);
}
        function redondearDosDecimales(valor) {
            return parseFloat(valor).toFixed(2);
        }

  // Función para obtener y guardar datos del formulario
function obtenerDatosFormulario(idProveedor, semanasString,dhl = true) {
    let form = document.getElementById("formEmbarque");
    let inputs = form.querySelectorAll("input");
    let data = {};
    var rango_dias = parseFloat($("#customerDeliveryTotal").text());
     // Obtener valores adicionales
     data['SalesFactorTotal'] = $("#SalesFactorTotal").text();
    data['CifFactor2'] = $("#CifFactor2").text();
    if(dhl){
        data['inputs'] = recolectarDatosFormularios();
    }else{
        const datosFormulariosDhl = {
                content_fin_exp: {},
        };
         recolectarDatosDeContenedor('content_dhl', datosFormulariosDhl.content_fin_exp);
         data['inputs'] =datosFormulariosDhl;
    }
    
    limpiarTodosLosFormularios();

   
   
    // Convertir string de semanas a array
    const semanas = semanasString.split(',').map(s => s.trim());
    let total = 0;
    

    
    // Procesar cada semana
    semanas.forEach(semana => {
        if (inputsArrayProducto[idProveedor].semanas[semana]) {
            var calculo = inputsArrayProducto[idProveedor].semanas[semana];
            
            calculo.calculo = data['inputs'];
            console.log("dentro del for", calculo);
            // Guardar datos para cada producto en la semana
            calculo.productos.forEach(value => {
                // Buscar si ya existe el producto en arrayProductosMargen
                let index = arrayProductosMargen.findIndex(item => 
                    item.producto === value.producto && 
                    item.code_cope === value.code_cope
                );

                if (index !== -1) {
                    // Si el producto ya existe, actualizar solo los campos requeridos
                    arrayProductosMargen[index].cif_valor = parseFloat(data['CifFactor2']) || 0;
                    arrayProductosMargen[index].sales_factor = parseFloat(data['SalesFactorTotal']) || 0;
                    arrayProductosMargen[index].rango_dias = obtenerRangoDias(rango_dias) +" Dias" ;
                    arrayProductosMargen[index].calculo = {
                        ...data,
                        calculo_idProveedor: idProveedor,
                        calculo_semana: semana,
                        semanasAgrupadas: semanas.filter(s => s !== semana) // Guardar referencia a otras semanas
                    };
                } else {
                    // Si el producto no existe, agregarlo
                    let productoNuevo = {
                        ...value,
                        cif_valor: parseFloat(data['CifFactor2']) || 0,
                        sales_factor: parseFloat(data['SalesFactorTotal']) || 0,
                        calculo: {
                            ...data,
                            calculo_idProveedor: idProveedor,
                            calculo_semana: semana,
                            semanasAgrupadas: semanas.filter(s => s !== semana)
                        }
                    };
                    arrayProductosMargen.push(productoNuevo);
                }
            });
        }
    });


    return data;
}

function obtenerRangoDias(numero) {
    if (!$.isNumeric(numero)) {
        console.error("El parámetro debe ser un número.");
        return null;
    }

    let min = Math.floor(numero / 5) * 5;
    let max = min + 5;

    return `${min}-${max}`;
}


         function guardarOrden(opcion) {
            console.log(arrayProductosMargen);
            const datosOrden = {
                ORD_PROVEEDOR_ID: $('#idProveedor').val(),  // Cambiar según los datos reales
                ORD_FECHA: "2025-02-20",
                ORD_DIRECCION: $('#direccion').val(),
                ORD_TIPO_ENVIO: $("#tipoEnvio").val(),
                ORD_ID_DEPARTAMENTO: $("#idDepartamento").val(),
                ORD_ID_PROVINCIAS: $("#idProvincia").val(),
                ORD_ID_DISTRITOS: $("#idDistrito").val(),
                ORD_USER_CREATE: 1,
                ORD_ID_PAIS_ORIGEN: $('#idPaisOrigen').val(),
                ORD_ID_PAIS_DESTINO: $('#idPaisDestino').val(),
                ORD_FECHA_LLEGADA_TENTATIVA: "2025-03-01",
                ORD_ID_METODO_PAGO: $('#idMetodopago').val(),
                ORD_COMENTARIOS: $('#comentarios').val(),
                ORD_ID_CLIENTE : $('#idCliente').val(),
                detalles: arrayProductosMargen
            };

            if(arrayProductosMargen.length == 0){
                alert("No hay producto agregados");
                return;
            }

            $.ajax({
                url: "/Orden/store",
                type: "POST",
                data: JSON.stringify(datosOrden),
                contentType: "application/json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                success: function(response) {
                    if (response.success) {
                        subirArchivos(response.idOrden,opcion);
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function(xhr) {
                    console.error("Error en la solicitud:", xhr);
                    alert("Hubo un error al registrar la orden.");
                }
            });
        }


        function subirArchivos(id_orden,opcion){
            if ($('#documentos')[0].files.length > 0) {
                // Creamos un FormData para enviar los archivos
                const formData = new FormData();
                
                // Agregamos cada archivo al FormData
                const files = $('#documentos')[0].files;
                for (let i = 0; i < files.length; i++) {
                    formData.append('files[]', files[i]);
                }
                
                // Agregamos el FILE_CODE (usamos el ID de la orden recién creada)
                formData.append('file_code', 'FILE_ORDEN');
                
                // Agregamos el FILE_ID_EXTERNO (también usamos el ID de la orden)
                formData.append('id_externo', id_orden);
                
                // Enviamos los archivos
                $.ajax({
                    url: "/Orden/upload/file", // Ruta a tu endpoint para subir archivos
                    type: "POST",
                    data: formData,
                    processData: false, // Importante para FormData
                    contentType: false, // Importante para FormData
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    success: function(uploadResponse) {
                        if (uploadResponse.success) {
                            alertify.alert("Orden registrada correctamente ", function(){
                                    alertify.message('OK');
                                    if(opcion == 1){
                                        window.location.href = "/Orden/create";
                                        
                                        }else{
                                            window.location.href = "/Orden/index";
                                        }
                                }).set('title', '¡Éxito!');
                               
                            } else {
                                
                            }
                    },
                    error: function(uploadXhr) {
                        console.error("Error al subir archivos:", uploadXhr);
                        alert("Orden registrada, pero hubo un error al subir los archivos.");
                    }
                });
            } else {
                // No hay archivos para subir
                alertify.alert("Orden registrada correctamente" , function(){
                                    alertify.message('OK');
                                    if(opcion == 1){
                                        window.location.href = "/Orden/create";
                                    }else{
                                        window.location.href = "/Orden/index";
                                    }
                                }).set('title', '¡Éxito!');

               
            }
        }
//------------------------------------------------------------------------------------------------------------------------------
// Variable global para la tabla y datos

// Al cargar la página (una sola vez)
$(document).ready(function() {
    initConsolidationTable();
});// Variable global para la tabla y datos
// Variable global para la tabla y datos
let consolidationTable;
let originalData;

// Función de inicialización de la tabla
function initConsolidationTable() {
    // Destruir la tabla si ya existe
    if ($.fn.DataTable.isDataTable('#consolidationTable')) {
        consolidationTable = $('#consolidationTable').DataTable();
        consolidationTable.destroy();
        $('#consolidationTable tbody').empty();
    }

    // Inicializar DataTable
    consolidationTable = $('#consolidationTable').DataTable({
        pageLength: 10,
        searching: true,
        ordering: true,
        columns: [
            { 
                data: null,
                defaultContent: '',
                orderable: false,
                render: function(data, type, row) {
                    return `<input type="checkbox" class="week-checkbox" value="${row.semana}">`;
                }
            },
            { data: 'semana', title: 'Semana' },
            { 
                data: 'semanasAgrupadas', 
                title: 'Semanas Agrupadas',
                render: function(data, type, row) {
                    if (!data || data.length === 0) return '-';
                    return data.sort((a, b) => parseInt(a) - parseInt(b)).join(', ');
                }
            },
            { data: 'cantidad', title: 'Cantidad Total' },
            { data: 'valor', title: 'Valor Total' },
            {
                data: null,
                orderable: false,
                render: function(data, type, row, meta) {
                    let selected = row.tipo_envio || "Agente"; // Puedes ajustar esto según el nombre del campo real en tu JSON

                    return `
                        <select class="form-select tipo-envio" data-index="${meta.row}">
                            <option value="1" ${selected === "Agente" ? "selected" : ""}>Agente</option>
                            <option value="2" ${selected === "DHL" ? "selected" : ""}>DHL</option>
                        </select>
                    `;
                }
            },
            { 
                data: null,
                title: 'Acciones',
                orderable: false,
                render: function(data, type, row) {
                    let semanas = row.semanasAgrupadas && row.semanasAgrupadas.length > 0 ? 
                                [...row.semanasAgrupadas, row.semana].join(',') : 
                                row.semana;
                    
                    return `<button type="button" class="btn btn-primary btn-sm" 
                            onclick="viewModalCalculo('${row.idProveedor}', '${semanas}')">
                            <i class="fas fa-calculator"></i> Cálculo
                           </button>`;
                }
            }
        ],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
        }
    });

    // Remover eventos anteriores
    $('#selectAll').off('change');
    $('#consolidateButton').off('click');

    // Agregar eventos nuevos
    $('#selectAll').on('change', function() {
        $('.week-checkbox').prop('checked', $(this).prop('checked'));
    });

    $('#consolidateButton').on('click', handleConsolidation);

    return consolidationTable;
}
// Función para actualizar datos

// Función para actualizar datos
function updateTableData(inputsArrayProducto) {
    if (!inputsArrayProducto) return;
    
    originalData = JSON.parse(JSON.stringify(inputsArrayProducto));
    const tableData = [];
    var subtotal_valor = 0;
    var subTotal_peso = 0;
    var subTotal_cantidad = 0;
    Object.keys(inputsArrayProducto).forEach(proveedorKey => {
        const proveedor = inputsArrayProducto[proveedorKey];
        if (proveedor.semanas) {
            Object.keys(proveedor.semanas).forEach(weekNum => {
                const weekData = proveedor.semanas[weekNum];
                subtotal_valor +=weekData.subtotalValor;
                subTotal_peso += weekData.subtotalPeso;
                subTotal_cantidad += weekData.subtotalCantidad;
                tableData.push({
                    idProveedor: proveedorKey,
                    semana: weekNum,
                    semanasAgrupadas: weekData.semanasAgrupadas || [],
                    cantidad: weekData.subtotalCantidad,
                    valor: `${formatoDolares(weekData.subtotalValor)}`,
                    // peso: weekData.subtotalPeso.toFixed(2),
                    // volumen: weekData.subtotal_lb_vol ? weekData.subtotal_lb_vol.toFixed(2) : '-'
                });
            });
        }
    });

    // Reinicializar tabla
    if (consolidationTable) {
        consolidationTable.clear();
        consolidationTable.rows.add(tableData);
        consolidationTable.draw();
    }

    $("#resumen-total-precio").text(formatoDolares(subtotal_valor));
    $("#resumen-total-peso").text(subTotal_peso);
    $("#resumen-total-cantidad").text(subTotal_cantidad);

    // Actualizar select de semanas
    updateWeekSelect(tableData.map(row => row.semana));
    
    // Actualizar tabla de márgenes
    productoMargen();
}


// Modificar la función handleConsolidation para incluir la actualización
function handleConsolidation() {
    const selectedWeeks = $('.week-checkbox:checked').map(function() {
        return $(this).val();
    }).get();

    if (selectedWeeks.length < 1) {
        alert('Por favor selecciona al menos 1 semanas para consolidar');
        return;
    }
    if ($('#targetWeek').val() < 1) {
        alert('ingrese una semana valida.');
        return;
    }

    const targetWeek = $('#targetWeek').val();
    const consolidatedData = consolidateWeeks(originalData, selectedWeeks, targetWeek);
    
    // Actualizar datos y vistas
    updateTableData(consolidatedData);
    actualizarArrayProductosMargen(consolidatedData);

    // Limpiar checkboxes
    $('#selectAll').prop('checked', false);
}

// Función para consolidar semanas
// Función para consolidar semanas
function consolidateWeeks(data, selectedWeeks, targetWeek) {
    let consolidatedData = JSON.parse(JSON.stringify(data));
    
    Object.keys(consolidatedData).forEach(proveedorKey => {
        const proveedor = consolidatedData[proveedorKey];
        if (proveedor.semanas) {
            // Inicializar semana objetivo
            proveedor.semanas[targetWeek] = proveedor.semanas[targetWeek] || {
                productos: [],
                subtotalCantidad: 0,
                subtotalValor: 0,
                subtotal_lb_vol: 0,
                subtotalPeso: 0,
                
                semanasAgrupadas: []
            };

            // Obtener semanas agrupadas existentes
            let semanasAgrupadas = [...(proveedor.semanas[targetWeek].semanasAgrupadas || [])];
            
            selectedWeeks.forEach(weekNum => {
                if (weekNum === targetWeek) return;

                const weekData = proveedor.semanas[weekNum];
                if (!weekData) return;

                // Consolidar productos
                weekData.productos.forEach(producto => {
                    proveedor.semanas[targetWeek].productos.push({
                        ...producto,
                        semanas: parseInt(targetWeek)
                    });
                });

                // Consolidar subtotales
                proveedor.semanas[targetWeek].subtotalCantidad += weekData.subtotalCantidad;
                proveedor.semanas[targetWeek].subtotalValor += weekData.subtotalValor;
                proveedor.semanas[targetWeek].subtotal_lb_vol += (weekData.subtotal_lb_vol || 0);
                proveedor.semanas[targetWeek].subtotalPeso += weekData.subtotalPeso;
                

                // Agregar a semanas agrupadas
                semanasAgrupadas.push(weekNum);

                // Si la semana a consolidar ya tenía semanas agrupadas, incluirlas también
                if (weekData.semanasAgrupadas && weekData.semanasAgrupadas.length > 0) {
                    semanasAgrupadas = [...semanasAgrupadas, ...weekData.semanasAgrupadas];
                }

                // Eliminar semana consolidada
                delete proveedor.semanas[weekNum];
            });

            // Actualizar array de productos margen
            proveedor.semanas[targetWeek].productos.forEach(producto => {
                const index = arrayProductosMargen.findIndex(p => 
                    p.code_cope === producto.code_cope && 
                    p.calculo && 
                    p.calculo.calculo_semana === targetWeek
                );

                if (index !== -1) {
                    arrayProductosMargen[index] = {
                        ...producto,
                        calculo: {
                            ...arrayProductosMargen[index].calculo,
                            semanasAgrupadas: [...new Set(semanasAgrupadas)]
                        }
                    };
                }
            });

            // Eliminar duplicados y asignar semanas agrupadas
            proveedor.semanas[targetWeek].semanasAgrupadas = [...new Set(semanasAgrupadas)];
        }
    });

    return consolidatedData;
}

// Función para actualizar el select de semanas
function updateWeekSelect(weeks) {
    const $select = $('#targetWeek');
    $select.empty();
    
    [...new Set(weeks)].sort((a, b) => parseInt(a) - parseInt(b))
        .forEach(week => {
            $select.append(`<option value="${week}">Semana ${week}</option>`);
        });
}



// Función para actualizar arrayProductosMargen cuando hay consolidación
function actualizarArrayProductosMargen(data) {
    // Limpiar array de productos margen existente
    arrayProductosMargen = [];
    
    // Recorrer la estructura de datos actualizada
    Object.keys(data).forEach(proveedorKey => {
        const proveedor = data[proveedorKey];
        if (proveedor.semanas) {
            Object.keys(proveedor.semanas).forEach(weekNum => {
                const weekData = proveedor.semanas[weekNum];
                
                // Procesar cada producto de la semana
                weekData.productos.forEach(producto => {
                    // Buscar si el producto ya existe en el array
                    const existingIndex = arrayProductosMargen.findIndex(p => 
                        p.code_cope === producto.code_cope &&
                        p.calculo &&
                        p.calculo.calculo_semana === weekNum
                    );

                    // Preparar el objeto del producto
                    const productoActualizado = {
                        ...producto,
                        semanas: parseInt(weekNum),
                        cantidad: producto.cantidad || 1,
                        semanasAgrupadas: weekData.semanasAgrupadas || []
                    };

                    // Si existe, actualizar, si no, agregar
                    if (existingIndex !== -1) {
                        arrayProductosMargen[existingIndex] = productoActualizado;
                    } else {
                        arrayProductosMargen.push(productoActualizado);
                    }
                });
            });
        }
    });

    // Actualizar la tabla de márgenes
    productoMargen();
}

$('#idCliente').on('change', function() {
    getCliente();
});

getCliente();
function getCliente(){
     // Enviamos los archivos
     $.ajax({
                    url: "/empresas/getdata/", // Ruta a tu endpoint para subir archivos
                    type: "GET",
                    data: {id:$('#idCliente').val()},
                    contentType: "application/json",
                    success: function(respuesta) {
                        $("#direccion").val(respuesta.EMP_DIRECCION);
                        $('#idProvincia').val(respuesta.EMP_ID_PROVINCIAS).trigger('change');
                        $('#idDepartamento').val(respuesta.EMP_ID_DEPARTAMENTO).trigger('change');
                        $('#idDistrito').val(respuesta.EMP_ID_DISTRITOS).trigger('change');
                    },
                    error: function(uploadXhr) {
                        console.error("Error al subir archivos:", uploadXhr);
                        alert("Orden registrada, pero hubo un error al subir los archivos.");
                    }
                });
}



// Función para recolectar todos los datos de los formularios
function recolectarDatosFormularios() {
    // Objeto para almacenar todos los datos
    const datosFormularios = {
        terms_and_conditions: {},
        expense_in_origen: {},
        expense_at_destination: {},
        import_taxes: {},
        fin_exp: {}
    };
    
    // Recolectar datos de cada contenedor
    recolectarDatosDeContenedor('content_terms_and_conditions', datosFormularios.terms_and_conditions);
    recolectarDatosDeContenedor('content_expense_in_origen', datosFormularios.expense_in_origen);
    recolectarDatosDeContenedor('content_expense_at_destination', datosFormularios.expense_at_destination);
    recolectarDatosDeContenedor('content_import_taxes', datosFormularios.import_taxes);
    recolectarDatosDeContenedor('content_fin_exp', datosFormularios.fin_exp);
    
    return datosFormularios;
}




// Función para recolectar datos de un contenedor específico
function recolectarDatosDeContenedor(idContenedor, objetoDestino) {
    // Seleccionar todos los inputs dentro del contenedor
    $(`.${idContenedor} input, .${idContenedor} select`).each(function() {
        // Obtener el elemento actual
        const $input = $(this);
        
        // Filtrar solamente los inputs que tienen la clase name_
        const clasesName = $input.attr('class').split(' ').filter(clase => clase.startsWith('name_'));
        
        // Si encontramos clases name_
        if (clasesName.length > 0) {
            const nombreClase = clasesName[0]; // Tomamos la primera clase name_
            const valorInput = $input.val();
            
            // Guardar el valor del input con su clase correspondiente
            objetoDestino[nombreClase] = {
                value: valorInput,
                element_id: $input.attr('id') || '',
                disabled: $input.prop('disabled') || false,
                readonly: $input.prop('readonly') || false
            };
        }
    });
    
    // También recolectar datos de las etiquetas que pueden tener valores (como totales)
    $(`.${idContenedor} label[id][class*="name_"]`).each(function() {
        const $label = $(this);
        const clasesName = $label.attr('class').split(' ').filter(clase => clase.startsWith('name_'));
        
        if (clasesName.length > 0) {
            const nombreClase = clasesName[0];
            const valorLabel = $label.text();
            
            objetoDestino[nombreClase] = {
                value: valorLabel,
                element_id: $label.attr('id') || '',
                type: 'label'
            };
        }
    });
}

// Asegúrate de que este código se ejecute después de que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Verifica que jQuery y Select2 estén cargados
    if (typeof jQuery !== 'undefined' && typeof jQuery.fn.select2 !== 'undefined') {
        // Inicializa Select2 cuando el modal se muestre (no antes)
        $('#modalDhl').on('shown.bs.modal', function() {
            // Inicializa Select2 con el contenedor correcto
            $('#service_type').select2({
                dropdownParent: $('#modalDhl .modal-body'),
                width: '100%'
            });
        });

        // También puedes reinicializar el Select2 al cerrar y volver a abrir el modal
        $('#modalDhl').on('hidden.bs.modal', function() {
            // Destruye la instancia de Select2 cuando se cierra el modal
            $('#service_type').select2('destroy');
        });
    } else {
        console.error('Select2 o jQuery no están disponibles');
    }
});
</script>


<script  type="text/javascript" src="{{ asset('js/calculo.js') }}" ></script>


@endsection