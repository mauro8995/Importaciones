@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar</h1>
    <form method="POST" action="/">
        @csrf
        <div class="card">
            <div class="card-header">
                Información Básica
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="RUB_NOMBRE" class="form-label">Nombre Rubro</label>
                        <input type="text" name="RUB_NOMBRE" id="RUB_NOMBRE" class="form-control" value="{{ $RUB_NOMBRE ?? '' }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Actualizar</button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script>
// Puedes añadir lógica adicional aquí con jQuery
</script>
@endsection