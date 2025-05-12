@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-3"><a class="btn btn-success" href="/TipoCuenta/create"> crear</a></div>
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
    TCU_ID ,
    TCU_NOMBRE AS [Nombre],
    TCU_USER_CREATE AS [Creado Por],
    TCU_USER_UPDATE AS [Actualizado Por],
    TCU_USER_DELETE AS [Eliminado Por],
    TCU_DELETE AS [Eliminado],
    TCU_DATE_DELETE AS [Fecha Eliminación],
    TCU_CREATED_AT AS [Fecha Creación],
    TCU_UPDATED_AT AS [Fecha Actualización]
FROM TIPO_CUENTA;
`;

		//let consultaSQL = "SELECT P.PRO_ID [nombre dire], PRO_NOMBRE [nombre producto] FROM PRODUCTOS AS P";

		cargarDataTable("TipoCuenta", "miTabla", consultaSQL,'TCU_ID');
</script>
@endsection