@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-3"><a class="btn btn-success" href="/Rubro/create"> crear</a></div>
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
    RUB_ID AS [ID],
    RUB_NOMBRE AS [Nombre],
    RUB_USER_CREATE AS [Creado Por],
    RUB_USER_UPDATE AS [Actualizado Por],
    RUB_USER_DELETE AS [Eliminado Por],
    RUB_DELETE AS [Eliminado],
    RUB_DATE_DELETE AS [Fecha Eliminación],
    RUB_CREATED_AT AS [Fecha Creación],
    RUB_UPDATED_AT AS [Fecha Actualización]
FROM RUBRO;`;

		//let consultaSQL = "SELECT P.PRO_ID [nombre dire], PRO_NOMBRE [nombre producto] FROM PRODUCTOS AS P";

		cargarDataTable("Rubro", "miTabla", consultaSQL,'BAN_ID');
</script>
@endsection