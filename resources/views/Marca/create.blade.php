@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear</h1>
    <form method="POST" action="{{ route('marca.store') }}">
        @csrf
        <div class="card">
            <div class="card-header">
                <h5>Información Básica</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="MAR_NOMBRE" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="MAR_NOMBRE" name="MAR_NOMBRE" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="MAR_DESCRIPCION" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="MAR_DESCRIPCION" name="MAR_DESCRIPCION">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="MAR_ICONO" class="form-label">Ícono</label>
                        <input type="text" class="form-control" id="MAR_ICONO" name="MAR_ICONO">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection
