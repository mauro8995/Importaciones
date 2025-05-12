@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear</h1>
    <form method="POST" action="/">
        @csrf
        <div class="card">
            <div class="card-header">
                Información Básica
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="TPRO_NOMBRE" class="form-label">Nombre</label>
                        <input type="text" name="TPRO_NOMBRE" id="TPRO_NOMBRE" class="form-control" required>
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