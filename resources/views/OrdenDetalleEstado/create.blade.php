@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear</h1>
    <form method="POST" action="/OrdenDetalleEstado/store">
        @csrf

        <div class="card">
            <div class="card-header">
                Información Básica
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="ORDS_NOMBRE" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="ORDS_NOMBRE" name="ORDS_NOMBRE" required>
                    </div>
                    <div class="col-md-6">
                        <label for="ORDS_COLOR" class="form-label">Color</label>
                        <input type="color" class="form-control" id="ORDS_COLOR" name="ORDS_COLOR" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="ORDS_ICONO" class="form-label">Ícono</label>
                        <input type="text" class="form-control" id="ORDS_ICONO" name="ORDS_ICONO" required>
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