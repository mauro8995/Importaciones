@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Proveedor</h1>
    <form method="POST" action="/Proveedores/store">
        @csrf
        <!-- Información Básica -->
        <div class="card mb-4">
            <div class="card-header">
                Información Básica
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="PRO_NOMBRE" class="form-label">Nombre</label>
                        <input type="text" name="PRO_NOMBRE" id="PRO_NOMBRE" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="PRO_TELEFONO" class="form-label">Teléfono</label>
                        <input type="text" name="PRO_TELEFONO" id="PRO_TELEFONO" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="PRO_CORREO" class="form-label">Correo</label>
                        <input type="email" name="PRO_CORREO" id="PRO_CORREO" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="PRO_DIRECCION" class="form-label">Dirección</label>
                        <input type="text" name="PRO_DIRECCION" id="PRO_DIRECCION" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    
                   
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
                        <label for="PRO_TIPO_CUENTA" class="form-label">Tipo de Cuenta</label>
                        <select name="PRO_TIPO_CUENTA" id="PRO_TIPO_CUENTA" class="form-select">
                            @foreach ( $tipo_cuenta as $item)
                            <option value="{{$item->TCU_ID}}">{{$item->TCU_NOMBRE}}</option>
                            @endforeach   
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="PRO_BANCO" class="form-label">Banco</label>
                        <select name="PRO_BANCO" id="PRO_BANCO" class="form-select">
                            @foreach ( $banco as $item)
                            <option value="{{$item->BAN_ID}}">{{$item->BAN_NOMBRE}}</option>
                            @endforeach                            
                            <!-- Opciones dinámicas --> 
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="PRO_NUMERO_CUENTA" class="form-label">Número de Cuenta intercancaria</label>
                        <input type="text" name="PRO_NUMERO_CUENTA" id="PRO_NUMERO_CUENTA_INTERBANCARIA" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="PRO_NUMERO_CUENTA" class="form-label">Número de Cuenta</label>
                        <input type="text" name="PRO_NUMERO_CUENTA" id="PRO_NUMERO_CUENTA" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="PRO_NUMERO_CUENTA_EXTRANJERO" class="form-label">Número de cuenta de extrajero</label>
                        <input type="text" name="PRO_NUMERO_CUENTA_EXTRANJERO" id="PRO_NUMERO_CUENTA_EXTRANJERO" class="form-control">
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
                    <div class="col-md-4">
                        <label for="PRO_NOMBRE_REPRESENTANTE" class="form-label">Nombre del Representante</label>
                        <input type="text" name="PRO_NOMBRE_REPRESENTANTE" id="PRO_NOMBRE_REPRESENTANTE" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="PRO_TIPO_PROVEEDOR" class="form-label">Tipo de Proveedor</label>
                        <select name="PRO_TIPO_PROVEEDOR" id="PRO_TIPO_PROVEEDOR" class="form-select">
                            @foreach ( $tipo_proveedor as $item)
                                <option value="{{$item->TPRO_ID}}">{{$item->TPRO_NOMBRE}}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="col-md-4">
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

$("#PRO_TIPO_PROVEEDOR").select2();
$("#PRO_TIPO_CUENTA").select2();
$("#PRO_ESTADO").select2();
</script>
@endsection