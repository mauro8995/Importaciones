@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-3"><a class="btn btn-success" href="/Banco/create"> crear</a></div>
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
    BAN_ID ,
    BAN_NOMBRE AS [Nombre],
    BAN_USER_CREATE AS [Creado Por],
    BAN_USER_UPDATE AS [Actualizado Por],
    BAN_USER_DELETE AS [Eliminado Por],
    BAN_DELETE AS [Eliminado],
    BAN_DATE_DELETE AS [Fecha Eliminación],
    BAN_CREATED_AT AS [Fecha Creación],
    BAN_UPDATED_AT AS [Fecha Actualización]
FROM BANCO;`;

		//let consultaSQL = "SELECT P.PRO_ID [nombre dire], PRO_NOMBRE [nombre producto] FROM PRODUCTOS AS P";

		cargarDataTable("Banco", "miTabla", consultaSQL,'BAN_ID');
</script>
@endsection