@extends('layouts.menu')

@section('content')
<div class="container">
    <h2>Crear Usuario</h2>
    <form method="POST" action="{{ route('admin.createUser') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="role">Rol</label>
            <select class="form-control" id="role" name="role">
                <option value="Administrador">Administrador</option>
                <option value="Médico">Médico</option>
                <option value="Paciente">Paciente</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
