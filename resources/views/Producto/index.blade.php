@extends('layouts.admin')

@section('content')
<div class="container">

    	<div class="row">
			<meta name="csrf-token" content="{{ csrf_token() }}">
			<div class="col-3 mb-2">
				<a href="/productos/create" class="btn btn-success">Crear</a>
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
		
			PRO.PRO_ID
			,PRO.PRO_CODE_INTERNO_CLIENTE AS [Código Interno Cliente]
			,PRO.PRO_NOMBRE AS [Nombre]
			,PRO.PRO_DESCRIPCION AS [Descripción]
			,PRO.PRO_PRECIO AS [Precio]
			,PRO.PRO_STOCK AS [Stock]
			,PRO.PRO_CODE_COPE AS [Código COPE]
			
			,UNI.UNI_NOMBRE AS [Unidad de Medida]
		FROM PRODUCTOS AS PRO
		inner join UNIDAD_MEDIDA AS UNI ON PRO.PRO_ID_UNIDAD_MEDIDA =UNI.UNI_ID `;

		//let consultaSQL = "SELECT P.PRO_ID [nombre dire], PRO_NOMBRE [nombre producto] FROM PRODUCTOS AS P";

		cargarDataTable("productos", "miTabla", consultaSQL,'PRO_ID');
</script>
@endsection
