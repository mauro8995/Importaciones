@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-3"><a class="btn btn-success" href="/empresas/create"> crear</a></div>
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
        EMP_ID ,
        EMP_NAME AS [Nombre],
        EMP_RUC AS [RUC],
        EMP_RAZON_SOCIAL AS [Razón Social],
        EMP_NOMBRE_COMERCIAL AS [Nombre Comercial],
        EMP_DIRECCION_FISCAL AS [Dirección Fiscal],
        EMP_DISTRITO AS [Distrito],
        EMP_TELEFONO AS [Teléfono],
        EMP_EMAIL AS [Correo Electrónico],
        EMP_ESTADO_SUNAT AS [Estado SUNAT],
        EMP_CONDICION_SUNAT AS [Condición SUNAT],
        EMP_REGIMEN_TRIBUTARIO AS [Régimen Tributario],
        DE.name AS [ Departamento],
        PRO.name AS [ID Provincia],
        DIS.name AS [ID Distrito]
        FROM EMPRESA as EM
		LEFT JOIN ubigeo_peru_departments AS DE ON DE.id = EM.EMP_ID_DEPARTAMENTO
		LEFT JOIN ubigeo_peru_provinces AS PRO ON PRO.id = EM.EMP_ID_PROVINCIAS
		LEFT JOIN ubigeo_peru_districts as DIS ON DIS.id = EM.EMP_ID_DISTRITOS;`;

		//let consultaSQL = "SELECT P.PRO_ID [nombre dire], PRO_NOMBRE [nombre producto] FROM PRODUCTOS AS P";

		cargarDataTable("empresas", "miTabla", consultaSQL,'EMP_ID');
</script>
@endsection