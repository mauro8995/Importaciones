@extends('layouts.admin')

@section('content')
<div class="container">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    	<div class="row mb-2">

			<div class="col-3">
				<a href="/OrdenDetalleEstado/create" class="btn btn-success">Crear</a>
			</div>
		</div>

	<div class="row">
		<table id="miTabla" class="display" style="width:100%">
			<thead>
				<tr>
					<!-- Las columnas se llenarán dinámicamente -->
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>

	</div>
</div>
@endsection
@section('scripts')
<script>


	    // Simulación de la consulta SQL como string
		let consultaSQL =  `SELECT  
                                ORDS_IDE,
                                ORDS_NOMBRE AS [Nombre],
                                ORDS_COLOR AS [Color],
                                ORDS_ICONO AS [Ícono],
                                ORDS_USER_CREATE AS [Creado por],
                                ORDS_USER_UPDATE AS [Actualizado por],
                                ORDS_USER_DELETE AS [Eliminado por],
                                ORDS_DELETE AS [Estado de eliminación],
                                ORDS_DELETE_AT AS [Fecha de eliminación],
                                ORDS_CREATED_AT AS [Fecha de creación],
                                ORDS_UPDATED_AT AS [Fecha de actualización]
                            FROM ORDEN_DETALLE_ESTADO
                            ORDER BY ORDS_IDE DESC;
                            `;

		//let consultaSQL = "SELECT P.PRO_ID [nombre dire], PRO_NOMBRE [nombre producto] FROM PRODUCTOS AS P";

		cargarDataTable("OrdenDetalleEstado", "miTabla", consultaSQL,'ORDS_IDE');
</script>
@endsection