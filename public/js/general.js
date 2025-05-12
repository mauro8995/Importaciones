var tipoEnvioEstadoOrden = [
    {
        id:1,
        nombre:"DHL"
    },
    {
        id:2,
        nombre:"Aduana"
    }
];
// Configurar idioma español por defecto para todas las DataTables
// Coloca este código antes de inicializar cualquier DataTable
$.extend(true, $.fn.dataTable.defaults, {
    language: {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copy": "Copiar",
            "csv": "CSV",
            "excel": "Excel",
            "pdf": "PDF",
            "print": "Imprimir",
            "colvis": "Visibilidad columnas"
        }
    }
});

function formatoDolares(numero) {
    // Verificar si el número es válido
    if (isNaN(numero) || numero === null || numero === undefined) {
        return "$0.00";
    }
    
    // Convertir a número en caso de que sea string
    let monto = parseFloat(numero);
    
    // Formatear con 2 decimales, separador de miles y símbolo de dólar
    return "$ " + monto.toLocaleString('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}
function cargarDataTable(urlBase, tableId, consultaSQL, idColumn) {
    $.ajax({
        url: "/filter/ejecutarConsulta", // URL del backend
        type: "GET",
        data: { query: consultaSQL },
        dataType: "json",
        success: function(response) {
            if (response.error) {
                alert(response.error);
                return;
            }

            // Construir columnas dinámicamente
            let columnasDataTable = response.columns.map(col => ({ data: col, title: col }));

            // Agregar columna extra para acciones (Editar y Eliminar)
            columnasDataTable.push({
                data: null,
                title: "Acciones",
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    let rowId = row[idColumn] || 'N/A'; // Usar idColumn dinámico
                    return `
                        <a href="/${urlBase}/edit/${rowId}" class="text-primary editar" data-id="${rowId}">
                            <i class="fas fa-edit"></i>
                        </a>
                        &nbsp;&nbsp;
                        <a href="#" class="text-danger eliminar" data-id="${rowId}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    `;
                }
            });

            // Destruir DataTable anterior si existe para evitar duplicaciones
            if ($.fn.DataTable.isDataTable(`#${tableId}`)) {
                $(`#${tableId}`).DataTable().destroy();
            }

            // Inicializar DataTable
            $(`#${tableId}`).DataTable({
                data: response.data,
                columns: columnasDataTable
            });
        },
        error: function(xhr) {
            alert("Error al ejecutar la consulta: " + xhr.responseText);
        }
    });

    // Evento para eliminar
    $(`#${tableId}`).on('click', '.eliminar', function() {
        let id = $(this).data('id');
    
        if (confirm("¿Estás seguro de eliminar el registro " + id + "?")) {
            $.ajax({
                url: `/`+urlBase+`/delete`, // Ruta del backend en Laravel
                method: 'POST', // Método HTTP
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                data: {
                    
                    id:id
                },
                success: function(response) {
                    alert("Registro eliminado: " + id);
                    location.reload(); // Recargar la página tras la eliminación
                },
                error: function(xhr) {
                    alert("Error al eliminar el registro. Inténtalo de nuevo.");
                    console.error(xhr.responseText);
                }
            });
        }
    });
}
