
@extends('layouts.admin')

@section('content')

    <style>
        .wp-header {
            background-color: #fff;
            box-shadow: 0 1px 0 rgba(0,0,0,.1);
            padding: 0 16px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .wp-title {
            font-size: 23px;
            font-weight: 400;
            margin: 0;
            padding: 9px 0 4px;
            line-height: 1.3;
        }
        .card {
            border-radius: 0;
            box-shadow: 0 1px 1px rgba(0,0,0,.04);
            border: 1px solid #c3c4c7;
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #c3c4c7;
            font-size: 14px;
            padding: 8px 12px;
            font-weight: 600;
        }
        .form-control, .form-select {
            border-radius: 3px;
            border: 1px solid #8c8f94;
        }
        .form-control:focus, .form-select:focus {
            border-color: #2271b1;
            box-shadow: 0 0 0 1px #2271b1;
        }
        .btn-primary {
            background-color: #2271b1;
            border-color: #2271b1;
        }
        .btn-primary:hover {
            background-color: #135e96;
            border-color: #135e96;
        }
        .sidebar-card {
            margin-bottom: 20px;
        }
      
        label {
            font-weight: 500;
            margin-bottom: 5px;
        }
        .meta-box {
            background-color: #fff;
            border: 1px solid #c3c4c7;
            margin-bottom: 20px;
        }
        .meta-box-header {
            padding: 8px 12px;
            border-bottom: 1px solid #c3c4c7;
            background-color: #f6f7f7;
            font-weight: 600;
        }
        .meta-box-content {
            padding: 12px;
        }
        .status-label {
            display: inline-block;
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-pending {
            background-color: #f0c33c;
            color: #000;
        }

        .dataTables_wrapper {
            min-width: 800px; /* Ajusta según tus necesidades */
            overflow-x: auto;
        }
    </style>






<div class="wp-header">
    <h1 class="wp-title">Editar Orden</h1>
    <div>
        <a href="/Orden/index" class="btn btn-outline-secondary btn-sm">Volver a la lista</a>
        <div class="btn btn-primary" onclick="enviarCotizacion()">Imprimir</div>
    </div>
</div>

<div class="container-fluid pb-5">
    <form id="orden-form" action="{{ route('ordenes.update', $orden->ORD_ID) }}" method="POST">
        @csrf
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="row">
            <!-- Columna Principal -->
            <div class="col-lg-9">
                <!-- Información Principal -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Información de la Orden</span>
                    </div>
                    <input type="hidden" name="ORD_ID" value="{{ $orden->ORD_ID }}" >
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="ORD_PROVEEDOR_ID">Proveedor</label>
                                <select id="ORD_PROVEEDOR_ID" name="ORD_PROVEEDOR_ID" class="form-select select2" required>
                                    <option value="">Seleccionar proveedor</option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{ $proveedor->PRO_ID }}" {{ $orden->ORD_PROVEEDOR_ID == $proveedor->PRO_ID ? 'selected' : '' }}>
                                            {{ $proveedor->PRO_NOMBRE }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ORD_PROVEEDOR_ID')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="ORD_ID_CLIENTE">Cliente</label>
                                <select id="ORD_ID_CLIENTE" name="ORD_ID_CLIENTE" class="form-select select2" required>
                                    <option value="">Seleccionar cliente</option>
                                    @foreach($cliente as $cli)
                                        <option value="{{ $cli->EMP_ID }}" {{ $orden->ORD_ID_CLIENTE == $cli->EMP_ID ? 'selected' : '' }}>
                                            {{ $cli->EMP_NAME }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ORD_PROVEEDOR_ID')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="ORD_FECHA">Fecha de Orden</label>
                                <div class="input-group">
                                    <input type="date" id="ORD_FECHA" name="ORD_FECHA" class="form-control" value="{{ $orden->ORD_FECHA }}" required>
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </div>
                                @error('ORD_FECHA')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="ORD_SEMANA_ENTREGA">Semana de Entrega</label>
                                <input type="number" id="ORD_SEMANA_ENTREGA" name="ORD_SEMANA_ENTREGA" class="form-control"  value="{{ $orden->ORD_SEMANA_ENTREGA }}" required>
                                @error('ORD_SEMANA_ENTREGA')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="ORD_FECHA_LLEGANDA_TENTATIVA">Fecha de Llegada Tentativa</label>
                                <div class="input-group">
                                    <input type="date" id="ORD_FECHA_LLEGANDA_TENTATIVA" name="ORD_FECHA_LLEGANDA_TENTATIVA" class="form-control" value="{{ $orden->ORD_FECHA_LLEGANDA_TENTATIVA }}" disabled>
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </div>
                                @error('ORD_FECHA_LLEGANDA_TENTATIVA')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="ORD_ID_PAIS_ORIGEN">País de Origen</label>
                                <select id="ORD_ID_PAIS_ORIGEN" name="ORD_ID_PAIS_ORIGEN" class="form-select select2" required>
                                    <option value="">Seleccionar país de origen</option>
                                    @foreach($paises as $pais)
                                        <option value="{{ $pais->PA_ID }}" {{ $orden->ORD_ID_PAIS_ORIGEN == $pais->PA_ID ? 'selected' : '' }}>
                                            {{ $pais->PA_NOMBRE }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ORD_ID_PAIS_ORIGEN')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="ORD_ID_PAIS_DESTINO">País de Destino</label>
                                <select id="ORD_ID_PAIS_DESTINO" name="ORD_ID_PAIS_DESTINO" class="form-select select2" required>
                                    <option value="">Seleccionar país de destino</option>
                                    @foreach($paises as $pais)
                                        <option value="{{ $pais->PA_ID }}" {{ $orden->ORD_ID_PAIS_DESTINO == $pais->PA_ID ? 'selected' : '' }}>
                                            {{ $pais->PA_NOMBRE }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ORD_ID_PAIS_DESTINO')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                      
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="ORD_ID_DEPARTAMENTO">Departamento</label>
                                <select id="ORD_ID_DEPARTAMENTO" name="ORD_ID_DEPARTAMENTO" class="form-select select2">
                                    <option value="">Seleccionar departamento</option>
                                    @foreach($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}" {{ $orden->ORD_ID_DEPARTAMENTO == $departamento->id ? 'selected' : '' }}>
                                            {{ $departamento->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ORD_ID_DEPARTAMENTO')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="ORD_ID_PROVINCIAS">Provincia</label>
                                <select id="ORD_ID_PROVINCIAS" name="ORD_ID_PROVINCIAS" class="form-select select2">
                                    <option value="">Seleccionar provincia</option>
                                    @foreach($provincias as $provincia)
                                        <option value="{{ $provincia->id }}" {{ $orden->ORD_ID_PROVINCIAS == $provincia->id ? 'selected' : '' }}>
                                            {{ $provincia->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ORD_ID_PROVINCIAS')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="ORD_ID_DISTRITOS">Distrito</label>
                                <select id="ORD_ID_DISTRITOS" name="ORD_ID_DISTRITOS" class="form-select select2">
                                    <option value="">Seleccionar distrito</option>
                                    @foreach($distritos as $distrito)
                                        <option value="{{ $distrito->id }}" {{ $orden->ORD_ID_DISTRITOS == $distrito->id ? 'selected' : '' }}>
                                            {{ $distrito->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ORD_ID_DISTRITOS')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="ORD_DIRECCION">Dirección de Entrega</label>
                                <textarea id="ORD_DIRECCION" name="ORD_DIRECCION" class="form-control" rows="3" required>{{ $orden->ORD_DIRECCION }}</textarea>
                                @error('ORD_DIRECCION')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="ORD_COMENTARIOS">Comentarios</label>
                                <textarea id="ORD_COMENTARIOS" name="ORD_COMENTARIOS" class="form-control" rows="3" required>{{ $orden->ORD_COMENTARIOS }}</textarea>
                                @error('ORD_COMENTARIOS')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Columna Lateral -->
            <div class="col-lg-3">
                 <!-- Infor general Orden -->
                 <div class="meta-box sidebar-card">
                    <div class="meta-box-header">
                        General
                    </div>
                    <div class="meta-box-content">
                        <div class="d-grid gap-2 ">
                            <div class="row">
                                <div class="col-6">Total Orden:<br> <strong class="total_detalle"></strong></div>
                                <div class="col-6">Orden cantidad Items:<br> <strong class="total_detalle_cantidad"></strong></div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <!-- Acciones -->
                <div class="meta-box sidebar-card">
                    <div class="meta-box-header">
                        Acciones
                    </div>
                    <div class="meta-box-content">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar Cambios
                            </button>
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <div  class="btn btn-danger" id="btnEliminar" >
                                <i class="fa-solid fa-trash"></i> Mover a papelera
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Estado -->
                <div class="meta-box sidebar-card">
                    <div class="meta-box-header">
                        Estado de la Orden
                    </div>
                    <div class="meta-box-content">
                        <select id="ODES_ID" name="ODES_ID" class="form-select mb-3">
                            @foreach($OrdenEstado as $estado)
                                <option value="{{ $estado->ODES_ID }}" 
                                    {{ $orden->ORD_ID_ORDEN_ESTADO == $estado->ODES_ID ? 'selected' : '' }}>
                                    {{ $estado->ODES_NOMBRE }}
                                </option>
                            @endforeach
                        </select>
                        @error('ODES_ID')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <!-- Información de Auditoría -->
                <div class="meta-box sidebar-card">
                    <div class="meta-box-header">
                        Información de Auditoría
                    </div>
                    <div class="meta-box-content">
                        <div class="mb-2">
                            <small><strong>Creado:</strong> <span id="created_at">{{ $orden->ORD_CREATED_AT }}</span></small>
                        </div>
                        <div class="mb-2">
                            <small><strong>Modificado:</strong> <span id="updated_at">{{ $orden->ORD_UPDATED_AT }}</span></small>
                        </div>
                        <div>
                            <small><strong>Por:</strong> <span id="user_update">{{ $orden->ORD_USER_CREATE != null ? $user_create->email:"-" }}</span></small>
                        </div>
                    </div>
                </div>
                 <!-- Documentos adjuntos -->
                 <div class="meta-box sidebar-card">
                    <div class="meta-box-header">
                        Documentos
                    </div>
                    <div class="meta-box-content">
                        <div class="row">
                            <div class="col-12">
                                <input type="file" class="form-control" id="documentos" multiple>
                                <div class="form-text">Puede seleccionar múltiples archivos</div>
                            </div>
                            <div class="col-12">
                                <div class="btn btn-success" onclick="subirArchivos({{ $orden->ORD_ID }})">Subir archivo</div>
                            </div>
                        </div>
                        @foreach ($documentos as $documento)
                        <div class="mb-2">
                            <small><strong>{{ $documento->FILE_TYPE}}:</strong> <a href="/Orden/descargar/{{ $documento->FILE_ID}}">descargar</a></small>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Detalles de la Orden -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detalle de Productos</span>
           
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="orden-detalles-table" class="table table-bordered table-striped w-100">
                            <thead>
                                <tr>
                                    <th>Producto </th>
                                    <th>Code Cope</th>
                                    <th>Cod Cliente</th>
                                    <th>Uni Medida</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Semanas</th>
                                    <th>CIF Valor</th>
                                    <th>Sales Factor</th>
                                    <th>Ad Valorem</th>
                                    <th>Ad Valorem Total</th>
                                    <th>Precio Uni</th>
                                    <th>Precio Uni Total</th>
                                    <th>Unidad Make Up</th>
                                    <th>Unidad Make Up Total</th>
                                    <th>Sale Sale</th>
                                    <th>Sale Sale Total</th>
                                    <th>Tipo de envio</th>
                                    <th>estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    Total Orden: <span class="fw-bold total_detalle" ></span>
                </div>
            </div>
        </div>
    </div>
</div>

















@endsection
@section('scripts')
<script>
    var dataselect =@json($OrdenEstadoDetalle);


 var table = $('#orden-detalles-table').DataTable({
    fixedColumns: {
        start: 1,
        end: 1
    },
    paging: false,
    scrollCollapse: true,
    scrollX: true,
    scrollY: 300,
    columnDefs: [
        { width: '450px', targets: 0 },
        { width: '150px', targets: 1 },
        // Asignar anchos específicos para el resto de columnas
        { width: '120px', targets: '_all' } // Ancho por defecto para todas las demás columnas
    ],
        ajax: {
            url: "/Orden/detalle/get",
            type: "GET",
            data: function(d) {
                d.idOrden = {{$orden->ORD_ID}}; // Añadir idOrden a la solicitud AJAX
                return d;
            }
        },
        columns: [
            {
                data: null,
                render: function(data, type, row) {
                    return row.producto.PRO_NOMBRE;
                }
            },
            {data: 'ORD_DET_CODE_COPE'},
            {data: 'ORD_DET_COD_CLIENTE'},
            {data: 'ORD_DET_UNI_MEDIDA'},
            {data: 'ORD_DET_CANTIDAD'},
            {data: 'ORD_DET_PRECIO',  
                render: function (data, type, row, meta) {
                    
                    return formatoDolares(row.ORD_DET_PRECIO);
                }
            },
            {data: 'ORD_DET_SEMANAS'},
            {data: 'ORD_DET_CIF_VALOR', 
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).css('background-color', '#FFFF99'); // Color amarillo claro
                },
                render: function (data, type, row, meta) {
                    
                    return formatoDolares(row.ORD_DET_CIF_VALOR);
                },
            },
            {data: 'ORD_DET_SALES_FACTOR', 
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).css('background-color', '#FFFF99'); // Color amarillo claro
                },
                render: function (data, type, row, meta) {
                    
                    return formatoDolares(row.ORD_DET_SALES_FACTOR);
                },
            },
            {data: 'ORD_DET_AD_VALOREM', 
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).css('background-color', '#FFFF99'); // Color amarillo claro
                },
                render: function (data, type, row, meta) {
                    
                    return formatoDolares(row.ORD_DET_AD_VALOREM);
                },
            },
            {data: 'ORD_DET_AD_VALOREM_TOTAL', 
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).css('background-color', '#FFFF99'); // Color amarillo claro
                },
                render: function (data, type, row, meta) {
                    
                    return formatoDolares(row.ORD_DET_AD_VALOREM_TOTAL);
                },
            },
            {data: 'ORD_DET_PRECIO_UNI', 
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).css('background-color', '#FFFF99'); // Color amarillo claro
                },
                render: function (data, type, row, meta) {
                    
                    return formatoDolares(row.ORD_DET_PRECIO_UNI);
                },
            },
            {data: 'ORD_DET_PRECIO_UNI_TOTAL', 
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).css('background-color', '#FFFF99'); // Color amarillo claro
                },
                render: function (data, type, row, meta) {
                    
                    return formatoDolares(row.ORD_DET_PRECIO_UNI_TOTAL);
                },
            },
            {data: 'ORD_DET_UNIDAD_MAKE_UP', 
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).css('background-color', '#F7A8C4'); // Color amarillo claro
                },
                render: function (data, type, row, meta) {
                    
                    return formatoDolares(row.ORD_DET_UNIDAD_MAKE_UP);
                },
            },
            {data: 'ORD_DET_UNIDAD_MAKE_UP_TOTAL',
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).css('background-color', '#F7A8C4'); // Color amarillo claro
                },
                render: function (data, type, row, meta) {
                    
                    return formatoDolares(row.ORD_DET_UNIDAD_MAKE_UP_TOTAL);
                },
            },
            {data: 'ORD_DET_SALE_SALE',
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).css('background-color', '#F7A8C4'); // Color amarillo claro
                },
                render: function (data, type, row, meta) {
                    
                    return formatoDolares(row.ORD_DET_SALE_SALE);
                },
            },
            {data: 'ORD_DET_SALE_SALE_TOTAL',
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).css('background-color', '#F7A8C4'); // Color amarillo claro
                },
                render: function (data, type, row, meta) {
                    
                    return formatoDolares(row.ORD_DET_SALE_SALE_TOTAL);
                },
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    // Generar un ID único para cada select en la fila
                    let selectId = `select2_tipo_envio_${meta.row}`;
                    
                    // Obtener el valor actual del tipo de envío (para preseleccionar)
                    let currentTipoEnvio = row.ORD_ID_TIPO_ENVIO;
                    
                    // Crear el select con un identificador único y guardar datos adicionales
                    let selectHtml = `<select id="${selectId}" class="form-control select2-tipo-envio" data-row-id="${meta.row}" data-orden-id="${row.ORD_DET_ID || ''}">`;
                    
                    // Agregar opciones dinámicamente, marcando como seleccionada la actual
                    tipoEnvioEstadoOrden.forEach(function (item) {
                        // Verificar si esta opción debe estar seleccionada
                        let selectedAttr = (item.id == currentTipoEnvio) ? 'selected="selected"' : '';
                        
                        selectHtml += `<option value="${item.id}" ${selectedAttr}>
                            ${item.nombre}
                        </option>`;
                    });
                    
                    selectHtml += `</select>`;
                    
                    return selectHtml;
                },
               
            },
            {
                
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    // Generar un ID único para cada select en la fila
                    let selectId = `select2_${meta.row}`;
                    
                    // Obtener el valor actual del estado de la orden (para preseleccionar)
                    let currentState = row.ORD_ID_ESTADO;
                    
                    // Crear el select con un identificador único y guardar datos adicionales como atributos data
                    let selectHtml = `<select id="${selectId}" class="form-control select2-ajax" data-row-id="${meta.row}" data-orden-id="${row.ORD_DET_ID || ''}">`;
                    
                    // Agregar opciones dinámicamente, marcando como seleccionada la que coincide con el estado actual
                    dataselect.forEach(function (item) {
                        // Verificar si esta opción debe estar seleccionada
                        let selectedAttr = (item.ORDS_IDE == currentState) ? 'selected="selected"' : '';
                        
                        selectHtml += `<option value="${item.ORDS_IDE}" data-color="${item.ORDS_COLOR}" 
                                    data-icono="${item.ORDS_ICONO}" ${selectedAttr}>
                            ${item.ORDS_NOMBRE}
                        </option>`;
                    });
                    
                    selectHtml += `</select>`;
                    
                    return selectHtml;
                }
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return '<div class="btn-group" role="group">' +
                            '<input type="hidden" name="idOrdenDetallle[]" class="idOrdenDetallle" value="' + row.ORD_DET_ID + '" > ' +
                        //    '<a href="javascript:void(0)" data-id="' + row.ORD_DET_ID + '" data-orden-id="' + row.ORD_ID_ORDEN_CABECERA + '" class="btn btn-success btn-sm editar-btn">Editar</a> ' +
                           '<div  data-id="' + row.ORD_DET_ID + '" data-orden-id="' + row.ORD_ID_ORDEN_CABECERA + '" class="btn btn-danger btn-sm eliminar-btn" onclick="delteOrdenDetalle(' + row.ORD_DET_ID + ')">Eliminar</div>' +
                           '</div>';
                }
            }
        ],
     
             drawCallback: function(settings) {
                var api = this.api();
                var total = api
                    .column(16, { page: 'current' }) // Cambia 4 por el índice de la columna a sumar
                    .data()
                    .reduce(function(a, b) {
                        return parseFloat(a) + parseFloat(b);
                    }, 0);

                // Mostrar la suma en el div
                $('.total_detalle').text(formatoDolares(total.toFixed(2)));
                
                  var filasTotal = api.rows().count();
                $('.total_detalle_cantidad').text(filasTotal)
            }
    });


    function subirArchivos(id_orden){
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
                            location.reload();
                            } else {
                            alert("Orden registrada, pero hubo problemas con los archivos: " + uploadResponse.message);
                        }
                    },
                    error: function(uploadXhr) {
                        console.error("Error al subir archivos:", uploadXhr);
                        alert("Orden registrada, pero hubo un error al subir los archivos.");
                    }
                });
            } else {
                // No hay archivos para subir
                alert("No hay archivos");

               
            }
        }
    
        function enviarCotizacion(){

        $.ajax({
        url: "/Cotizacion/orden/{{ $orden->ORD_ID }}",
        method: "POST",
        data:{
            id_orden:{{ $orden->ORD_ID }}
        } , // Enviamos como JSON
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




        $('#orden-detalles-table').on('draw.dt', function () {
            $('.select2-ajax').each(function() {
                var $select = $(this);
                
                // Inicializar Select2
                $select.select2({
                    width: '100%',
                    placeholder: "Seleccione una opción"
                });
                
                // Configurar evento AJAX para cuando cambia el valor
                $select.off('change').on('change', function() {
                    var selectedValue = $(this).val();
                    var ordenId = $(this).data('orden-id');
                    
                    $.ajax({
                        url: '/Orden/update/ordenEstado',
                        method: 'POST',
                        dataType: 'json',
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") // Importante para Laravel
                        },
                        data: {
                            orden_estado: selectedValue,
                            id_orden: ordenId
                        },
                        success: function(response) {
                            console.log('Estado actualizado correctamente', response);
                            
                            // Si necesitas refrescar la tabla:
                            table.ajax.reload(null, false);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error al actualizar el estado', error);
                        }
                    });
                });
            });
        });

        $('#orden-detalles-table').on('draw.dt', function () {
            $('.select2-tipo-envio').each(function() {
                var $select = $(this);
                
                // Inicializar Select2
                $select.select2({
                    width: '100%',
                    placeholder: "Seleccione tipo de envío"
                });
                
                // Configurar evento AJAX para cuando cambia el valor
                $select.off('change').on('change', function() {
                    var selectedValue = $(this).val();
                    var ordenId = $(this).data('orden-id');
                    
                    $.ajax({
                        url: '/Orden/update/ordenTipoEnvio',
                        method: 'POST',
                        dataType: 'json',
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") // Importante para Laravel
                        },
                        data: {
                            tipo_envio: selectedValue,
                            id_orden: ordenId
                        },
                        success: function(response) {
                            console.log('Tipo de envío actualizado correctamente', response);
                            table.ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error al actualizar el tipo de envío', error);
                        }
                    });
                });
            });
        });


        table.columns().every(function(index) {
    var columnWidth;
    if (index === 0) {
        columnWidth = '350px';
    } else if (index === 1) {
        columnWidth = '150px';
    }  
    else if (index === 18) {
        columnWidth = '150px';
    } 
    else if (index === 19) {
        columnWidth = '150px';
    } 
    else {
        columnWidth = '100px';
    }
    
    // Forzar el ancho con una regla CSS más fuerte
    $('head').append('<style>#orden-detalles-table th:nth-child(' + (index + 1) + '), ' +
                    '#orden-detalles-table td:nth-child(' + (index + 1) + ') { ' +
                    'width: ' + columnWidth + ' !important; ' +
                    'min-width: ' + columnWidth + ' !important; ' +
                    'max-width: ' + columnWidth + ' !important; ' +
                    '}</style>');
});
    



$("#btnEliminar").click(function() {
        if (confirm("¿Está seguro que desea mover esta orden a la papelera?")) {
            var ordenId = $("input[name='ORD_ID']").val();
            
            $.ajax({
                url: '/Orden/delete', // Ajusta esta URL según tu estructura de rutas
                type: 'POST',
                headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") // Importante para Laravel
                        },
                data: {
                    id: ordenId
                },
                success: function(response) {
                    if (response.object == "success") {
                        alert("La orden ha sido movida a la papelera correctamente.");
                        // Redireccionar a la lista de órdenes
                        window.location.href = '/Orden/index';
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Error al procesar la solicitud. Intente nuevamente.");
                    console.log(xhr.responseText);
                }
            });
        }
    });

function delteOrdenDetalle(idOrdenDetalle) {
        if (confirm("¿Está seguro que desea mover esta orden a la papelera?")) {
                        
            $.ajax({
                url: '/Orden/detalle/delete', // Ajusta esta URL según tu estructura de rutas
                type: 'POST',
                headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") // Importante para Laravel
                        },
                data: {
                    idOrdenDetalle: idOrdenDetalle
                },
                success: function(response) {
                    if (response.object == "success") {
                        table.ajax.reload(null, false);
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Error al procesar la solicitud. Intente nuevamente.");
                    console.log(xhr.responseText);
                }
            });
        }
    };
    

</script>
@endsection


