<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización COPE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 10px;
        }
        .container {
            width: 100%;
            border-collapse: collapse;
        }
        .header-left {
            width: 20%;
            border: 1px solid #000;
            padding: 10px;
            vertical-align: top;
        }
        .header-right {
            width: 80%;
            border: 1px solid #000;
            padding: 5px 10px;
            text-align: center;
        }
        .sidebar {
            width: 20%;
            border: 1px solid #000;
            padding: 10px;
            vertical-align: top;
        }
        
        .content {
            width: 80%;
            padding: 0;
            vertical-align: top;
        }
        .logo {
            max-width: 150px;
        }
        .title {
            color: #14365D;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #000;
        }
        .subtitle {
            font-weight: bold;
            margin-top: 15px;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-table th {
            background-color: #D33B22;
            color: white;
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }
        .data-table td {
            border: 1px solid #000;
            padding: 5px;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .header-row {
            background-color: #14365D;
            color: white;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <table class="container">
        <!-- Encabezado -->


        <tr>
            <!-- Barra lateral con información de la cotización -->
            <td class="sidebar">
                <div>
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/logo.png'))) }}" alt="COPE Logo" class="logo">
                    <div>
                        {{ $empresa['direccion'] }}<br>
                        RUC {{ $empresa['ruc'] }}
                    </div>
                </div>
                <hr>
                <div class="subtitle">COTIZACIÓN:</div>
                <div style="text-align: center; font-weight: bold; margin: 10px 0;">COPE-Q-250105</div>
                <hr>
                <div class="subtitle">FECHA:</div>
                <div>{{ now()->locale('es')->isoFormat('dddd D [de] MMMM [de] YYYY') }}</div>
                <hr>
                <div class="subtitle">NOMBRE O RAZÓN SOCIAL:</div>
                <div>{{ $cliente['EMP_RUC'] }}</div>
                <div>{{ $cliente['EMP_RAZON_SOCIAL'] }}</div>
                <hr>
                <div class="subtitle">RUC</div>
                <div>{{ $cliente['EMP_RUC'] }}</div>
                <hr>
                <div class="subtitle">REQUERIMIENTO No:</div>
                <div>-</div>
                <hr>
                <div class="subtitle">FECHA DE REQUERIMIENTO:</div>
                <div>{{ now()->locale('es')->isoFormat('dddd D [de] MMMM [de] YYYY') }}</div>
                <hr>
                <div class="subtitle">TÉRMINOS:</div>
                <div>DDP</div>
                <div>CARRETERA NEGRITOS S/N</div>
                <div>BASE MANTA, TALARA - PIURA</div>
                <hr>
                <div class="subtitle">VALIDEZ:</div>
                <div>{{ now()->locale('es')->isoFormat('dddd D [de] MMMM [de] YYYY') }}</div>
                <hr>
                <div class="subtitle">CONDICIONES DE PAGO:</div>
                <div>60 DIAS DE FACTURACION</div>
                <hr>
                <div class="subtitle">COTIZADO POR:</div>
                <div>{{ $user['name'] }} {{$user['Apellido'] }}</div>
                <hr>
                <div class="subtitle">TELÉFONO DE CONTACTO:</div>
                <div>+51 996 839 351</div>
            </td>
            
            <!-- Tabla de cotización -->
            <td class="content">
                <center><div class="title">COTIZACION</div></center> 
                <table class="data-table">
                    <tr>
                        <th>ITEM</th>
                        <th>CODIGO</th>
                        <th>NUMERO DE PARTE COTIZADO</th>
                        <th>NUMERO DE PARTE SUSTITUIDO O EQUIVALENTE</th>
                        <th>NUMERO DE PARTE CLIENTE</th>
                        <th>DESCRIPCION</th>
                        <th>MARCA</th>
                        <th>UNIDAD</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO UNITARIO USD</th>
                        <th>TOTAL</th>
                        <th>TIEMPO ENTREGA</th>
                    </tr>
                    @php
                        $cantidad = 0;
                        $subtotal = 0;
                    @endphp
                    @foreach ($cotizaciones as $item)
                    @php
                        $cantidad++;
                        $subtotal += $item['sale_sale_total'];
                    @endphp
                    <tr>
                        <td class="text-center">{{$cantidad }}</td>
                        <td>{{ $item['info']['producto']['PRO_CODE_PARTE_CLIENTE'] }}</td>
                        <td>{{ $item['info']['producto']['PRO_CODE_PARTE'] }}</td>
                        <td>{{ $item['info']['producto']['PRO_CODE_PARTE'] }}</td>
                        <td>{{ $item['info']['producto']['PRO_CODE_PARTE_CLIENTE'] }}</td>
                        <td>{{ $item['info']['producto']['PRO_DESCRIPCION'] }}</td>
                        <td>SUPERIOR</td>
                        <td class="text-center">{{ $item['info']['unidad_medida']['UNI_NOMBRE'] }}</td>
                        <td class="text-center">{{ $item['cantidad'] }}</td>
                        <td class="text-right">{{ number_format($item['sale_sale'],2)  }}</td>
                        <td class="text-right">{{number_format($item['sale_sale_total'],2)  }}</td>
                        <td class="text-center">{{ $item['rango_dias'] }}</td>
                    </tr>
                    @endforeach
                    
                    <!-- Filas de totales con estilo similar al mostrado en la imagen -->
                    <tr style="background-color: #e52d2d; color: white;">
                        <td colspan="10" class="text-right" style="text-align: right; padding-right: 10px; font-weight: bold;">TOTAL</td>
                        <td class="text-right" style="text-align: right; font-weight: bold;">{{ number_format($subtotal, 2) }}</td>
                        <td style="text-align: center; font-weight: bold;">USD</td>
                    </tr>
                    @php
                        $igv = $subtotal * 0.18;
                        $total = $subtotal + $igv;
                    @endphp
                    <tr style="background-color: #e52d2d; color: white;">
                        <td colspan="10" class="text-right" style="text-align: right; padding-right: 10px; font-weight: bold;">IGV, 18%</td>
                        <td class="text-right" style="text-align: right; font-weight: bold;">{{ number_format($igv, 2) }}</td>
                        <td style="text-align: center; font-weight: bold;">USD</td>
                    </tr>
                    <tr style="background-color: #e52d2d; color: white;">
                        <td colspan="10" class="text-right" style="text-align: right; padding-right: 10px; font-weight: bold;">TOTAL</td>
                        <td class="text-right" style="text-align: right; font-weight: bold;">{{ number_format($total, 2) }}</td>
                        <td style="text-align: center; font-weight: bold;">USD</td>
                    </tr>
                </table>
                
                <!-- Observaciones -->
                <div style="margin-top: 10px; border: 1px solid #000;">
                    <div style="padding: 5px;">
                        <strong>OBSERVACIONES:</strong>
                        <ol>
                            <li>Productos cotizados sujetos a venta previa, por lo que los tiempos de entrega se confirmaran al momento de recibir la Orden de Compra</li>
                            <li>Productos cotizados son originales nuevos</li>
                            <li>La garantía de las repuestos y partes es de 12 meses a partir de la fecha de su entrega. La garantía de las repuestos y partes cubre defectos del material y la mano de obra durante todo el período de garantía una vez que se haya</li>
                            <li>Los precios están expresados en Dólares Americanos</li>
                        </ol>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>