@extends('layouts.admin')

@section('content')
<div class="container">

    	<div class="row">

			<div class="col-3">
				<a href="/Proveedor/create">Crear</a>
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
		let consultaSQL =  `  
		
		SELECT 
    PRO_ID ,
    PRO_NOMBRE AS [Nombre],
    PRO_TELEFONO AS [Teléfono],
    PRO_CORREO AS [Correo],
    PRO_DIRECCION AS [Dirección],
    PRO_MONEDA AS [Moneda],
    PRO_TIPO_CUENTA AS [Tipo de Cuenta],
    PRO_BANCO AS [Banco],
    PRO_NUMERO_CUENTA AS [Número de Cuenta],
    PRO_NOMBRE_REPRESENTANTE AS [Nombre del Representante],
    PRO_TIPO_PROVEEDOR AS [Tipo de Proveedor],
    PRO_RUBRO AS [Rubro],
    PRO_ESTADO AS [Estado],
    PRO_USER_CREATE AS [Creado Por],
    PRO_USER_UPDATE AS [Actualizado Por],
    PRO_USER_DELETE AS [Eliminado Por],
    PRO_DELETE AS [Eliminado],
    PRO_DATE_DELETE AS [Fecha Eliminación],
    PRO_CREATED_AT AS [Fecha Creación],
    PRO_UPDATED_AT AS [Fecha Actualización]
FROM PROVEEDOR;
`;

		//let consultaSQL = "SELECT P.PRO_ID [nombre dire], PRO_NOMBRE [nombre producto] FROM PRODUCTOS AS P";

		cargarDataTable("Proveedor", "miTabla", consultaSQL,'PRO_ID');
</script>
@endsection
