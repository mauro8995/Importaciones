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
                <div class="mb-3">
                    <label for="BAN_NOMBRE" class="form-label">Nombre del Banco</label>
                    <input type="text" class="form-control" id="BAN_NOMBRE" name="BAN_NOMBRE" value="{{ old('BAN_NOMBRE', $banco->BAN_NOMBRE) }}" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>
</div>
@endsection
@section('scripts')
<script>
</script>
@endsection