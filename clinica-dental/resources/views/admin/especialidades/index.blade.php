@extends('layouts.menu')

@section('content')
    <div class="container">
        <h1>Especialidades</h1>
    <a href="{{ route('admin.especialidades.create') }}" class="btn btn-primary mb-3">Nueva Especialidad</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($especialidades as $especialidad)
                <tr>
                    <td>{{ $especialidad->id }}</td>
                    <td>{{ $especialidad->name }}</td>
                    <td>{{ $especialidad->description }}</td>
                    <td>
                        <a href="{{ route('admin.especialidades.edit', $especialidad->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('admin.especialidades.destroy', $especialidad->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta especialidad?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Agregar paginación si es necesario -->
    {{ $especialidades->links() }}
    </div>


@endsection
