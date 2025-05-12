@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Proveedor</h1>
    <form method="POST" action="/">
        @csrf
        <!-- Información Básica -->
        <div class="card mb-4">
            <div class="card-header">
                Información Básica
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="PRO_NOMBRE" class="form-label">Nombre</label>
                        <input type="text" name="PRO_NOMBRE" value="{{ $PRO_NOMBRE ??  }}" id="PRO_NOMBRE" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="PRO_TELEFONO" class="form-label">Teléfono</label>
                        <input type="text" name="PRO_TELEFONO" value="{{ $PRO_TELEFONO ??  }}" id="PRO_TELEFONO" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="PRO_CORREO" class="form-label">Correo</label>
                        <input type="email" name="PRO_CORREO" value="{{ $PRO_CORREO ??  }}" id="PRO_CORREO" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="PRO_DIRECCION" class="form-label">Dirección</label>
                        <input type="text" name="PRO_DIRECCION" value="{{ $PRO_DIRECCION ??  }}" id="PRO_DIRECCION" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <!-- Información Financiera -->
        <div class="card mb-4">
            <div class="card-header">
                Información Financiera
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="PRO_MONEDA" class="form-label">Moneda</label>
                        <input type="text" name="PRO_MONEDA" value="{{ $PRO_MONEDA ??  }}" id="PRO_MONEDA" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="PRO_TIPO_CUENTA" class="form-label">Tipo de Cuenta</label>
                        <select name="PRO_TIPO_CUENTA" id="PRO_TIPO_CUENTA" class="form-select">
                            <option value="">Seleccione</option>
                            <!-- Opciones dinámicas -->
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="PRO_BANCO" class="form-label">Banco</label>
                        <select name="PRO_BANCO" id="PRO_BANCO" class="form-select">
                            <option value="">Seleccione</option>
                            <!-- Opciones dinámicas -->
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="PRO_NUMERO_CUENTA" class="form-label">Número de Cuenta</label>
                        <input type="text" name="PRO_NUMERO_CUENTA" value="{{ $PRO_NUMERO_CUENTA ??  }}" id="PRO_NUMERO_CUENTA" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <!-- Información Adicional -->
        <div class="card mb-4">
            <div class="card-header">
                Información Adicional
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="PRO_NOMBRE_REPRESENTANTE" class="form-label">Nombre del Representante</label>
                        <input type="text" name="PRO_NOMBRE_REPRESENTANTE" value="{{ $PRO_NOMBRE_REPRESENTANTE ??  }}" id="PRO_NOMBRE_REPRESENTANTE" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="PRO_TIPO_PROVEEDOR" class="form-label">Tipo de Proveedor</label>
                        <select name="PRO_TIPO_PROVEEDOR" id="PRO_TIPO_PROVEEDOR" class="form-select">
                            <option value="">Seleccione</option>
                            <!-- Opciones dinámicas -->
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="PRO_RUBRO" class="form-label">Rubro</label>
                        <select name="PRO_RUBRO" id="PRO_RUBRO" class="form-select">
                            <option value="">Seleccione</option>
                            <!-- Opciones dinámicas -->
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="PRO_ESTADO" class="form-label">Estado</label>
                        <select name="PRO_ESTADO" id="PRO_ESTADO" class="form-select">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script>
// Puedes añadir lógica adicional aquí con jQuery
</script>
@endsection