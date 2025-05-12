@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear</h1>
    <form method="POST" action="/OrdenEstado/store">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4>Información Básica</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="ODES_NOMBRE">Nombre</label>
                        <input type="text" name="ODES_NOMBRE" id="ODES_NOMBRE" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="ODES_COLOR">Color</label>
                        <input type="color" name="ODES_COLOR" id="ODES_COLOR" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="ODES_ICONO">Ícono</label>
                        <input type="text" name="ODES_ICONO" id="ODES_ICONO" class="form-control">
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
