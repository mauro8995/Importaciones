@extends('layouts.admin')

@section('content')
<div class="container">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
    	<div class="row mb-2">
            <div class="col-3">
            <a href="/Orden/create" class="btn btn-success">Crear Cotización</a>
          </div>
        </div>
        <div id="filtros-container" class="row mb-2">
            
        </div>
        <div class="row mb-2">
            <div class="col-3 " >
                <button class="btn btn-success" id="btnFiltrar">Filtrar</button>
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
            ORD_ID ,
            P.PRO_NOMBRE AS [Proveedor],
            EM.EMP_NAME AS [Cliente],
            ORD_FECHA AS [Fecha de Orden],
            ORD_SEMANA_ENTREGA AS [Semana de Entrega],
            ORD_DIRECCION AS [Dirección de Entrega],
            U.email AS [Usuario que Creó],
            us.email AS [Usuario que Actualizó],
            ORE.ODES_NOMBRE AS [Estado de orden],
            ORD_CREATED_AT AS [Fecha de Creación],
            ORD_UPDATED_AT AS [Última Actualización],
            PAO.PA_NOMBRE AS [ País Origen],
            PAD.PA_NOMBRE AS [ País Destino],
            ORD_FECHA_LLEGANDA_TENTATIVA AS [Fecha Llegada Tentativa],
            FORMAT(ORD_TOTAL_ORDEN, '$ #,##0.00') AS [Total de la Orden]
          FROM ORDEN_CABECERA AS OC
          LEFT JOIN users AS U ON OC.ORD_USER_CREATE = U.id
          INNER JOIN PROVEEDOR AS P on P.PRO_ID = OC.ORD_PROVEEDOR_ID
          INNER JOIN PAIS AS PAD ON PAD.PA_ID = OC.ORD_ID_PAIS_DESTINO
          INNER JOIN PAIS AS PAO ON PAO.PA_ID = OC.ORD_ID_PAIS_ORIGEN
          LEFT JOIN users AS us ON us.id = OC.ORD_USER_UPDATE
          LEFT JOIN ORDEN_ESTADO AS ORE ON ORE.ODES_ID = OC.ORD_ID_ORDEN_ESTADO
           LEFT JOIN EMPRESA AS EM ON EM.EMP_ID = OC.ORD_ID_CLIENTE
            WHERE ORD_DELETE = 0
          ORDER BY ORD_ID DESC;
    
        `;

		//let consultaSQL = "SELECT P.PRO_ID [nombre dire], PRO_NOMBRE [nombre producto] FROM PRODUCTOS AS P";

		cargarDataTable("Orden", "miTabla", consultaSQL,'ORD_ID');











    let columnas = [
        { nombre: "ORD_ID_CLIENTE", tipo: "int", esLlaveForanea: true, label: "Cliente", tabla: "EMPRESA", valueField: "EMP_ID", textField: "EMP_NAME" , delete :"EMP_DELETE" },
        { nombre: "ORD_PROVEEDOR_ID", tipo: "int", esLlaveForanea: true, label: "Proveedor", tabla: "PROVEEDOR", valueField: "PRO_ID", textField: "PRO_NOMBRE" ,delete :"PRO_DELETE" },
        { nombre: "ORD_ID_ORDEN_ESTADO", tipo: "int", esLlaveForanea: true, label: "Estado", tabla: "ORDEN_ESTADO", valueField: "ODES_ID", textField: "ODES_NOMBRE",delete :"ODES_DELETE"  },
        { nombre: "ORD_FECHA", tipo: "date", esLlaveForanea: false, label: "Fecha de Orden" },
        { nombre: "ORD_SEMANA_ENTREGA", tipo: "int", esLlaveForanea: false, label: "Semana de Entrega" }
    ];

    let filtrosContainer = $("#filtros-container");

    columnas.forEach(col => {
        let filtroHtml = "";

        if (col.esLlaveForanea) {
            filtroHtml = `
                <div class="col-md-3">
                    <label for="${col.nombre}">${col.label}:</label>
                    <select id="${col.nombre}" class="form-control select2">
                        <option value="">Seleccione un ${col.label}</option>
                    </select>
                </div>`;

            cargarOpcionesSelect(col.nombre, col.tabla, col.valueField, col.textField,col.delete);
        } else if (col.tipo === "date") {
            filtroHtml = `
                <div class="col-md-3">
                    <label for="${col.nombre}">${col.label}:</label>
                    <input type="date" id="${col.nombre}" class="form-control">
                </div>`;
        } else if (col.tipo === "int") {
            filtroHtml = `
                <div class="col-md-3">
                    <label for="${col.nombre}">${col.label}:</label>
                    <input type="number" id="${col.nombre}" class="form-control">
                </div>`;
        }

        filtrosContainer.append(filtroHtml);
    });

    setTimeout(() => {
        $(".select2").select2({
            width: "100%",
            placeholder: "Seleccione una opción"
        });
    }, 10);

    function cargarOpcionesSelect(selectId, tabla, valueField, textField,deleted) {
        $.ajax({
            url: "/tableInfo",
            type: "GET",
            headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
            data: { tabla: tabla, valueField: valueField, textField: textField,delete:deleted },
            dataType: "json",
            success: function (data) {
                let select = $("#" + selectId);
                select.empty().append('<option value="">Seleccione una opción</option>');
                select.append('<option value="0">Seleccione una opción</option>');
                data.forEach(function (item) {
                    select.append(`<option value="${item[valueField]}">${item[textField]}</option>`);
                });

                select.trigger("change");
            },
            error: function () {
                console.error("Error al cargar datos para", tabla);
            }
        });
    }

















    // Evento para aplicar filtros
    $("#btnFiltrar").click(function () {
        let whereConditions = "ORD_DELETE = 0";

        // Recorrer dinámicamente los filtros dentro del div #filtros-container
        $("#filtros-container").find("input, select").each(function () {
            let id = $(this).attr("id");
            let valor = $(this).val();

            if (valor) {
                // Si el campo es un input de fecha
                if ($(this).attr("type") === "date") {
                    whereConditions += ` AND OC.${id} = '${valor}'`;
                }
                // Si el campo es un input de número
                else if ($(this).attr("type") === "number") {
                    whereConditions += ` AND OC.${id} = ${valor}`;
                }
                // Si el campo es un select (clave foránea)
                else {
                    if(valor != 0)
                    whereConditions += ` AND OC.${id} = '${valor}'`;
                }
            }
        });

        // Construcción de la consulta SQL con filtros dinámicos
        let consultaSQL = `
            SELECT 
                ORD_ID,
                P.PRO_NOMBRE AS [Proveedor],
                EM.EMP_NAME AS [Cliente],
                ORD_FECHA AS [Fecha de Orden],
                ORD_SEMANA_ENTREGA AS [Semana de Entrega],
                ORD_DIRECCION AS [Dirección de Entrega],
                U.email AS [Usuario que Creó],
                us.email AS [Usuario que Actualizó],
                ORE.ODES_NOMBRE AS [Estado de orden],
                ORD_CREATED_AT AS [Fecha de Creación],
                ORD_UPDATED_AT AS [Última Actualización],
                PAO.PA_NOMBRE AS [País Origen],
                PAD.PA_NOMBRE AS [País Destino],
                ORD_FECHA_LLEGANDA_TENTATIVA AS [Fecha Llegada Tentativa],
                ORD_TOTAL_ORDEN AS [Total de la Orden]
            FROM ORDEN_CABECERA AS OC
            LEFT JOIN users AS U ON OC.ORD_USER_CREATE = U.id
            INNER JOIN PROVEEDOR AS P ON P.PRO_ID = OC.ORD_PROVEEDOR_ID
            INNER JOIN PAIS AS PAD ON PAD.PA_ID = OC.ORD_ID_PAIS_DESTINO
            INNER JOIN PAIS AS PAO ON PAO.PA_ID = OC.ORD_ID_PAIS_ORIGEN
            LEFT JOIN users AS us ON us.id = OC.ORD_USER_UPDATE
            LEFT JOIN ORDEN_ESTADO AS ORE ON ORE.ODES_ID = OC.ORD_ID_ORDEN_ESTADO
            LEFT JOIN EMPRESA AS EM ON EM.EMP_ID = OC.ORD_ID_CLIENTE
            WHERE ${whereConditions}
            ORDER BY ORD_ID DESC;
        `;

        console.log("Consulta generada:", consultaSQL);
        
        // Llamar a la función para recargar la tabla con la nueva consulta
        cargarDataTable("Orden", "miTabla", consultaSQL, 'ORD_ID');
    });
</script>
@endsection
