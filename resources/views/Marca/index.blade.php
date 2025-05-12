@extends('layouts.admin')

@section('content')
<div class="container">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    	<div class="row mb-2">

			<div class="col-3">
				<a href="/Marca/create" class="btn btn-success">Crear</a>
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
                MAR_IDE ,
                MAR_NOMBRE AS [nombre],
                MAR_DESCRIPCION AS [descripcion],
                MAR_ICONO AS [icono],
                MAR_USER_CREATE AS [usuario_creacion],
                MAR_USER_UPDATE AS [usuario_actualizacion],
                MAR_USER_DELETE AS [usuario_eliminacion],
                MAR_DELETE AS [eliminado],
                MAR_DELETE_AT AS [fecha_eliminacion],
                MAR_CREATED_AT AS [fecha_creacion],
                MAR_UPDATED_AT AS [fecha_actualizacion]
            FROM MARCA;
                            `;

		//let consultaSQL = "SELECT P.PRO_ID [nombre dire], PRO_NOMBRE [nombre producto] FROM PRODUCTOS AS P";

		cargarDataTable("Marca", "miTabla", consultaSQL,'MAR_IDE');
</script>
@endsection