
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
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script>
</script>
@endsection
