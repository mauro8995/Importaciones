@extends('layouts.admin')




@section('content')
<div class="container">
    <h1>Configurar Filtros</h1>
    <form id="filterForm">
        <div class="mb-3">
            <label for="tableSelect" class="form-label">Selecciona una tabla:</label>
            <textarea id="Consulta" name="Consulta" class="form-control" rows="4"></textarea>
        </div>
        <div class="btn btn-success" onClick="obtenerFiltros()">Obtener Filtros</div>
        </div>

         <!-- Contenedor de checkboxes -->
         <div id="columnsContainer">
            <!-- Los checkboxes se generarán aquí -->
        </div>
        <button type="submit" class="btn btn-primary">Continuar</button>
    </form>
</div>
@endsection



@section('scripts')
<script>
    
    

       
        // Evento para manejar selección múltiple
         function obtenerFiltros() {
     
            // Realizar la consulta para obtener columnas agrupadas por tabla
            $.ajax({
                url: '{{ route("filters.columns") }}',
                type: 'POST',
                data: { consulta: $("#Consulta").val() },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (columnsData) {
                    generateCheckboxes(columnsData.all_columns);
                },
                error: function () {
                    alert('Error al obtener las columnas de las tablas seleccionadas.');
                }
            });
        };





        function generateCheckboxes(data) {
    window.columnData = data;
    const container = $('#columnsContainer');
    container.empty();

    Object.entries(data.all_columns).forEach(([tableName, tableInfo]) => {
        const tableDiv = $('<div>').addClass('table-group mb-3');
        
        // Cabecera de la tabla
        tableDiv.append(
            $('<h6>').addClass('mb-2').text(`${tableName} (${tableInfo.alias})`)
        );

        tableInfo.columns.forEach(column => {
            const columnDiv = $('<div>').addClass('column-container mb-2');
            const checkboxDiv = $('<div>').addClass('form-check');
            
            // Crear el checkbox
            const checkbox = $('<input>')
                .addClass('form-check-input column-checkbox')
                .attr({
                    type: 'checkbox',
                    id: `${column.table_alias}_${column.column_name}`,
                    'data-table': column.table,
                    'data-column': column.column_name,
                    'data-alias': column.table_alias,
                    'data-type': column.data_type,
                    'data-basic-type': getSqlBasicType(column.data_type)
                });

            // Crear la etiqueta
            const label = $('<label>')
                .addClass('form-check-label')
                .attr('for', `${column.table_alias}_${column.column_name}`)
                .text(`${column.column_name}`);
                
            // Agregar input para el label personalizado
            const labelInput = $('<input>')
                .addClass('form-control form-control-sm mt-1 custom-label-input')
                .attr({
                    type: 'text',
                    placeholder: 'Personalizar label',
                    'data-table': column.table,
                    'data-column': column.column_name,
                    id: `label_${column.table_alias}_${column.column_name}`
                })
                .val(column.column_name);

            // Agregar badge con el tipo
            const typeSpan = $('<span>')
                .addClass('badge bg-info ms-2')
                .text(getSqlBasicType(column.data_type));
            label.append(typeSpan);

            // Agregar íconos para PK y FK
            if (column.is_primary_key) {
                label.append(' 🔑');
            }
            
            checkboxDiv.append(checkbox, label);
            columnDiv.append(checkboxDiv);
            columnDiv.append(labelInput);
            // Si es llave foránea, agregar contenedor para el select
            if (column.is_foreign_key && column.foreign_key_info) {
                label.append(' 🔗');
                
                const fkContainer = $('<div>')
                    .addClass('fk-select-container ms-4')
                    .css('display', 'none');
                
                fkContainer.append(
                    $('<small>')
                        .addClass('text-muted')
                        .text(`Referencias a ${column.foreign_key_info.referenced_table}`)
                );
                
                columnDiv.append(fkContainer);

                // Manejar el cambio del checkbox para esta columna FK
                checkbox.on('change', function() {
                    const $fkContainer = $(this).closest('.column-container').find('.fk-select-container');
                    if (this.checked) {
                        $fkContainer.slideDown();
                        loadReferencedTableColumns(
                            column.foreign_key_info,
                            $fkContainer,
                            column.table_alias,
                            column.column_name
                        );
                    } else {
                        $fkContainer.slideUp();
                    }
                });
            }

            tableDiv.append(columnDiv);
        });

        container.append(tableDiv);
    });

    // Inicializar eventos
    $('#searchColumns').on('input', function() {
        const searchText = $(this).val().toLowerCase();
        $('.column-container').each(function() {
            const label = $(this).find('label').text().toLowerCase();
            $(this).toggle(label.includes(searchText));
        });
    });

    $('#selectAll').click(function() {
        $('.column-checkbox:visible').prop('checked', true).trigger('change');
    });

    $('#deselectAll').click(function() {
        $('.column-checkbox:visible').prop('checked', false).trigger('change');
    });
}
    // Función para obtener las columnas seleccionadas con su tipo
    function getSelectedColumnsWithTypes() {
        const selected = [];
        $('.column-checkbox:checked').each(function() {
            selected.push({
                table: $(this).data('table'),
                column: $(this).data('column'),
                alias: $(this).data('alias'),
                sqlType: $(this).data('type'),
                basicType: $(this).data('basic-type')
            });
        });
        return selected;
    }
  
    function getSqlBasicType(sqlType) {
        const type = sqlType.toLowerCase().trim();
        const baseType = type.split('(')[0];
        
        switch (baseType) {
            case 'int':
            case 'bigint':
            case 'smallint':
            case 'tinyint':
                return 'INTEGER';
                
            case 'decimal':
            case 'numeric':
            case 'float':
            case 'real':
            case 'money':
            case 'smallmoney':
                return 'DECIMAL';
                
            case 'date':
            case 'datetime':
            case 'datetime2':
            case 'smalldatetime':
            case 'time':
                return 'DATETIME';
                
            case 'char':
            case 'nchar':
            case 'varchar':
            case 'nvarchar':
            case 'text':
            case 'ntext':
                return 'STRING';
                
            case 'bit':
            case 'boolean':
                return 'BOOLEAN';
                
            default:
                return 'UNKNOWN';
        }
    }


    function loadReferencedTableColumns(foreignKeyInfo, $selectContainer, tableAlias, columnName) {
    $.ajax({
        url: '/get-table-columns',
        method: 'POST',
        headers:{
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        data: {
            table: foreignKeyInfo.referenced_table,
          
        },
        success: function(response) {
            const selectId = `fk_${tableAlias}_${columnName}`;
            
            // Crear el select si no existe
            let $select = $selectContainer.find(`#${selectId}`);
            if (!$select.length) {
                $select = $('<select>')
                    .addClass('form-select mt-2')
                    .attr('id', selectId);
                
                // Opción por defecto
                $select.append($('<option>', {
                    value: '',
                    text: `Seleccione columna de ${foreignKeyInfo.referenced_table}`
                }));
                
                $selectContainer.append($select);
            } else {
                $select.empty(); // Limpiar opciones existentes
            }
            
            // Agregar las columnas al select
            response.columns.forEach(column => {
                $select.append($('<option>', {
                    value: column.column_name,
                    text: `${column.column_name} (${column.data_type})`,
                    'data-type': column.data_type,
                    'data-basic-type': getSqlBasicType(column.data_type)
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error('Error cargando columnas:', error);
            $selectContainer.append(
                $('<div>')
                    .addClass('alert alert-danger mt-2')
                    .text('Error al cargar las columnas relacionadas')
            );
        }
    });
}
</script>
@endsection
