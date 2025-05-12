@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear</h1>
    <form method="POST" action="/productos/store">
        @csrf
        <div class="card">
            <div class="card-header">
                Información Básica
            </div>
            <div class="card-body">
                <div class="row">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="PRO_CODE_COPE">Código COPE interno</label>
                        <div class="input-group">
                            <span class="input-group-text">COPE-</span>
                            <input type="text" class="form-control" placeholder="Código" name="PRO_CODE_COPE" id="PRO_CODE_COPE" value="">
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="PRO_HS_CODIGO">Codigo HS</label>
                        <input type="text"  class="form-control" id="PRO_HS_CODIGO" name="PRO_HS_CODIGO" value="" >
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="PRO_PARTIDA">N° Partida</label>
                        <input type="text"  class="form-control" id="PRO_PARTIDA" name="PRO_PARTIDA" value="" >
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <label for="PRO_CODE_PARTE_CLIENTE">Codigo parte cliente</label>
                        <input type="text" class="form-control" id="PRO_CODE_PARTE_CLIENTE" name="PRO_CODE_PARTE_CLIENTE" value="" >
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="PRO_CODE_PARTE">Codigo parte</label>
                        <input type="text" class="form-control" id="PRO_CODE_PARTE" name="PRO_CODE_PARTE" value="" >
                    </div>
                    <div class="col-md-9 mb-3">
                        <label for="PRO_NOMBRE">Nombre</label>
                        <input type="text" class="form-control" id="PRO_NOMBRE" name="PRO_NOMBRE" value="" required>
                    </div>
                    
                    
                   
    
                  
    
                    <div class="col-md-3 mb-3">
                        <label for="PRO_ID_UNIDAD_MEDIDA">Unidad Medida</label>
                        <select class="form-control" id="PRO_ID_UNIDAD_MEDIDA" name="PRO_ID_UNIDAD_MEDIDA">
                            @foreach ($unidad_medida as $item)
                                <option value="{{ $item->UNI_ID }}" >
                                    {{ $item->UNI_NOMBRE }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="col-md-3 mb-3">
                        <label for="PRO_PRECIO_UNITARIO">Precio Unitario</label>
                        <input type="number" step="0.01" class="form-control" id="PRO_PRECIO_UNITARIO" name="PRO_PRECIO_UNITARIO" value="" required>
                    </div>
    
                    <div class="col-md-3 mb-3">
                        <label for="PRO_ID_PROVEEDOR">Proveedor</label>
                        <select name="PRO_ID_PROVEEDOR" id="PRO_ID_PROVEEDOR" class="form-select">
                            @foreach ($proveedor as $item)
                                <option value="{{ $item->PRO_ID }}" >
                                    {{ $item->PRO_NOMBRE }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                        <div class="col-md-3">
                            <label for="PRO_MARGEN">Margen</label>
                            <input type="number" step="0.01" class="form-control" id="PRO_MARGEN" name="PRO_MARGEN" value="" required>
                        </div>
                        <div class="col-md-3">
                            <label for="PRO_ARANCELES">Aranceles</label>
                            <input type="number" step="0.01" class="form-control" id="PRO_ARANCELES" name="PRO_ARANCELES" value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="PRO_DESCRIPCION">Descripción</label>
                            <textarea class="form-control" id="PRO_DESCRIPCION" name="PRO_DESCRIPCION"></textarea>
                        </div>

                </div>
                <div>
                    <div class="col-6">
                        <div class="row g-3">
                            <!-- Fila 1: Alto -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="PRO_ALTO">Alto (IN)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_ALTO" name="PRO_ALTO" value="" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="PRO_ALTO_CM">Alto (CM)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_ALTO_CM" name="PRO_ALTO_CM" value="" disabled>
                                    </div>
                                   
                                </div>
                            </div>
                    
                            <!-- Fila 2: Ancho -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="PRO_ANCHO">Ancho (IN)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_ANCHO" name="PRO_ANCHO" value="" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="PRO_ANCHO_CM">Ancho (CM)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_ANCHO_CM" name="PRO_ANCHO_CM" value="" disabled>
                                    </div>
                                
                                </div>
                            </div>
                            <!-- Fila 2: Ancho -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="PRO_ANCHO">Profundidad (IN)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_PROFUNDIDAD" name="PRO_PROFUNDIDAD" value="" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="PRO_ANCHO_CM">Profundidad (CM)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_PROFUNDIDAD_CM" name="PRO_PROFUNDIDAD_CM" value="" disabled>
                                    </div>
                                
                                </div>
                            </div>
                    
                            <!-- Fila 3: Peso -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="PRO_PESO">Peso (LIBRAS)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_PESO" name="PRO_PESO" value="" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="PRO_PESO_KG">Peso (KG)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_PESO_KG" name="PRO_PESO_KG" value="" disabled>
                                    </div>
                               
                                </div>
                            </div>
                    
                          
                        </div>
                    </div>
                </div>

                   
    
                  
    
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
@section('scripts')
<script>
    $("#PRO_ID_UNIDAD_MEDIDA").select2();

      // Función para convertir pulgadas a centímetros
      function pulgadasACentimetros(pulgadas) {
        return (pulgadas * 2.54).toFixed(2);
    }

    // Función para convertir libras a kilogramos
    function librasAKilogramos(libras) {
        return (libras * 0.453592).toFixed(2);
    }

    // Evento para Alto (IN)
    $("#PRO_ALTO").on("input", function () {
        let valor = $(this).val();
        $("#PRO_ALTO_CM").val(valor ? pulgadasACentimetros(valor) : '');
    });

    // Evento para Ancho (IN)
    $("#PRO_ANCHO").on("input", function () {
        let valor = $(this).val();
        $("#PRO_ANCHO_CM").val(valor ? pulgadasACentimetros(valor) : '');
    });

    // Evento para Peso (LIBRAS)
    $("#PRO_PESO").on("input", function () {
        let valor = $(this).val();
        $("#PRO_PESO_KG").val(valor ? librasAKilogramos(valor) : '');
    });

    $("#PRO_PROFUNDIDAD").on("input", function () {
        let valor = $(this).val();
        $("#PRO_PROFUNDIDAD_CM").val(valor ? pulgadasACentimetros(valor) : '');
    });
</script>
@endsection
