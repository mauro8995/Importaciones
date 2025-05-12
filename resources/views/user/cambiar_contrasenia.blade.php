@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Cambiar Contraseña</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.updatePassword') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="current_password" class="form-label">Contraseña Actual</label>
            <input type="hidden" class="form-control" name="id_user" value="{{ $id_user }}">
            <input type="password" class="form-control" name="current_password" required>
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">Nueva Contraseña</label>
            <input type="password" class="form-control" name="new_password" required>
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
            <input type="password" class="form-control" name="new_password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
    </form>
</div>
@endsection
