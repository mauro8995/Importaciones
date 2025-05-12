@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar</h1>
    <form method="POST" action="{{ route('productos.update', $producto->PRO_ID) }}">
        @csrf
        <div class="card">
            <div class="card-header">Información Básica</div>
            <div class="card-body">
                <div class="row">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="PRO_CODE_COPE">Código COPE interno</label>
                        <div class="input-group">
                            <span class="input-group-text">COPE-</span>
                            <input type="text" class="form-control" placeholder="Código" name="PRO_CODE_COPE" id="PRO_CODE_COPE" value="{{ $producto->PRO_CODE_COPE }}">
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="PRO_HS_CODIGO">Codigo HS</label>
                        <input type="text"  class="form-control" id="PRO_HS_CODIGO" name="PRO_HS_CODIGO" value="{{ $producto->PRO_HS_CODIGO }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="PRO_PARTIDA">N° Partida</label>
                        <input type="text"  class="form-control" id="PRO_PARTIDA" name="PRO_PARTIDA" value="{{ $producto->PRO_PARTIDA }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="PRO_CODE_INTERNO_CLIENTE">Codigo interno cliente</label>
                        <input type="text"  class="form-control" id="PRO_CODE_INTERNO_CLIENTE" name="PRO_CODE_INTERNO_CLIENTE" value="{{ $producto->PRO_CODE_INTERNO_CLIENTE }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="PRO_CODE_PARTE_CLIENTE">Codigo parte cliente</label>
                        <input type="text" class="form-control" id="PRO_CODE_PARTE_CLIENTE" name="PRO_CODE_PARTE_CLIENTE" value="{{ $producto->PRO_CODE_PARTE_CLIENTE }}" >
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="PRO_CODE_PARTE">Codigo parte</label>
                        <input type="text" class="form-control" id="PRO_CODE_PARTE" name="PRO_CODE_PARTE" value="{{ $producto->PRO_CODE_PARTE }}" >
                    </div>
                    
                    <div class="col-md-9 mb-3">
                        <label for="PRO_NOMBRE">Nombre</label>
                        <input type="text" class="form-control" id="PRO_NOMBRE" name="PRO_NOMBRE" value="{{ $producto->PRO_NOMBRE }}" required>
                    </div>

                   
    
                  
    
                    <div class="col-md-3 mb-3">
                        <label for="PRO_ID_UNIDAD_MEDIDA">Unidad Medida</label>
                        <select class="form-control" id="PRO_ID_UNIDAD_MEDIDA" name="PRO_ID_UNIDAD_MEDIDA">
                            @foreach ($unidad_medida as $item)
                                <option value="{{ $item->UNI_ID }}" {{ $producto->PRO_ID_UNIDAD_MEDIDA == $item->UNI_ID ? 'selected' : '' }}>
                                    {{ $item->UNI_NOMBRE }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="col-md-3 mb-3">
                        <label for="PRO_PRECIO_UNITARIO">Precio Unitario</label>
                        <input type="number" step="0.01" class="form-control" id="PRO_PRECIO_UNITARIO" name="PRO_PRECIO_UNITARIO" value="{{ $producto->PRO_PRECIO }}" required>
                    </div>
    
                    <div class="col-md-3 mb-3">
                        <label for="PRO_ID_PROVEEDOR">Proveedor</label>
                        <select name="PRO_ID_PROVEEDOR" id="PRO_ID_PROVEEDOR" class="form-select">
                            @foreach ($proveedor as $item)
                                <option value="{{ $item->PRO_ID }}" {{ $producto->PRO_ID_PROVEEDOR == $item->PRO_ID ? 'selected' : '' }}>
                                    {{ $item->PRO_NOMBRE }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                        <div class="col-md-3">
                            <label for="PRO_MARGEN">Margen</label>
                            <input type="number" step="0.01" class="form-control" id="PRO_MARGEN" name="PRO_MARGEN" value="{{ $producto->PRO_MARGEN }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="PRO_ARANCELES">Aranceles</label>
                            <input type="number" step="0.01" class="form-control" id="PRO_ARANCELES" name="PRO_ARANCELES" value="{{ $producto->PRO_ARANCELES }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="PRO_DESCRIPCION">Descripción</label>
                            <textarea class="form-control" id="PRO_DESCRIPCION" name="PRO_DESCRIPCION">{{ $producto->PRO_DESCRIPCION }}</textarea>
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
                                        <input type="number" step="0.01" class="form-control" id="PRO_ALTO" name="PRO_ALTO" value="{{ $producto->PRO_ALTO }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="PRO_ALTO_CM">Alto (CM)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_ALTO_CM" name="PRO_ALTO_CM" value="{{ $producto->PRO_ALTO * 2.54 }}" disabled>
                                    </div>
                                   
                                </div>
                            </div>
                    
                            <!-- Fila 2: Ancho -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="PRO_ANCHO">Ancho (IN)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_ANCHO" name="PRO_ANCHO" value="{{ $producto->PRO_ANCHO }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="PRO_ANCHO_CM">Ancho (CM)</label>                        
                                        <input type="number" step="0.01" class="form-control" id="PRO_ANCHO_CM" name="PRO_ANCHO_CM" value="{{ $producto->PRO_ANCHO * 2.54 }}" disabled>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="PRO_ANCHO">Profundidad (IN)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_PROFUNDIDAD" name="PRO_PROFUNDIDAD" value="{{ $producto->PRO_PROFUNDIDAD }}" >
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
                                        <input type="number" step="0.01" class="form-control" id="PRO_PESO" name="PRO_PESO" value="{{ $producto->PRO_PESO }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="PRO_PESO_KG">Peso (KG)</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_PESO_KG" name="PRO_PESO_KG" value="{{ $producto->PRO_PESO * 0.453592 }}" disabled>
                                    </div>
                              
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="PRO_PESO">Dencidad</label>
                                        <input type="number" step="0.01" class="form-control" id="PRO_DENSIDAD" name="PRO_DENSIDAD" value="{{ $producto->PRO_DENSIDAD }}" >
                                    </div>
                              
                                </div>
                            </div>
                    
                          
                        </div>
                    </div>
                </div>

                   
    
                  
    
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
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

    $("#PRO_PROFUNDIDAD").on("input", function () {
        let valor = $(this).val();
        $("#PRO_PROFUNDIDAD_CM").val(valor ? pulgadasACentimetros(valor) : '');
    });

    
    // Evento para Peso (LIBRAS)
    $("#PRO_PESO").on("input", function () {
        let valor = $(this).val();
        $("#PRO_PESO_KG").val(valor ? librasAKilogramos(valor) : '');
    });
</script>
@endsection
