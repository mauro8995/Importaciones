@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Empresa</h1>
    <form method="POST" action="/empresas/store">
        @csrf
        <div class="card">
            <div class="card-header">
                Información Básica
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="EMP_NAME">Nombre</label>
                        <input type="text" class="form-control" name="EMP_NAME" required>
                    </div>
                    <div class="col-md-6">
                        <label for="EMP_RUC">RUC</label>
                        <input type="text" class="form-control" name="EMP_RUC" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="EMP_RAZON_SOCIAL">Razón Social</label>
                        <input type="text" class="form-control" name="EMP_RAZON_SOCIAL">
                    </div>
                    <div class="col-md-6">
                        <label for="EMP_NOMBRE_COMERCIAL">Nombre Comercial</label>
                        <input type="text" class="form-control" name="EMP_NOMBRE_COMERCIAL">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="EMP_TELEFONO">Teléfono</label>
                        <input type="text" class="form-control" name="EMP_TELEFONO">
                    </div>
                    <div class="col-md-3">
                        <label for="EMP_ID_DEPARTAMENTO">Deparamento</label>
                        <select id="EMP_ID_DEPARTAMENTO" name="EMP_ID_DEPARTAMENTO" class="form-control">
                            @foreach ($Departamento as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="EMP_TELEFONO">Provincia</label>
                        <select id="EMP_ID_PROVINCIAS" name="EMP_ID_PROVINCIAS" class="form-control">
                            @foreach ($Provincia as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="EMP_TELEFONO">Dsitritos</label>
                        <select id="EMP_ID_DISTRITOS" name="EMP_ID_DISTRITOS" class="form-control">
                            @foreach ($Distrito as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="EMP_DIRECCION">Direccion</label>
                        <input type="text" class="form-control" name="EMP_DIRECCION" id="EMP_DIRECCION">
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
</script>
@endsection