@extends('layouts.admin')

@section('content')
<div class="container">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    	<div class="row">

			<div class="col-3 mb-2">
				<a href="/OrdenEstado/create" class="btn btn-success">Crear</a>
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
		let consultaSQL =  `  SELECT  
							ODES_ID , 
							ODES_NOMBRE AS [Nombre Estado], 
							ODES_COLOR AS [Color], 
							ODES_ICONO AS [Ícono], 
							ODES_USER_CREATE AS [Creado por], 
							ODES_USER_UPDATE AS [Actualizado por], 
							ODES_USER_DELETE AS [Eliminado por], 
							ODES_DELETE AS [Eliminado], 
							ODES_DELETE_AT AS [Fecha Eliminación], 
							ODES_CREATED_AT AS [Fecha Creación], 
							ODES_UPDATED_AT AS [Fecha Actualización]
						FROM ORDEN_ESTADO 
						WHERE ODES_DELETE = 0;
 `;

		//let consultaSQL = "SELECT P.PRO_ID [nombre dire], PRO_NOMBRE [nombre producto] FROM PRODUCTOS AS P";

		cargarDataTable("OrdenEstado", "miTabla", consultaSQL,'ODES_ID');
</script>
@endsection
