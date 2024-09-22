@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Pacientes</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Paciente</a>

    <table class="table">
        <thead>
            <tr>
                <th>N° de Expediente</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Fecha de Nacimiento</th>
                <th>Género</th>
                <th>Estado Civil</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->expediente }}</td>
                    <td>{{ $patient->nombres }}</td>
                    <td>{{ $patient->apellidos }}</td>
                    <td>{{ $patient->fecha_nacimiento->format('d/m/Y') }}</td>
                    <td>{{ ucfirst($patient->genero) }}</td>
                    <td>{{ ucfirst($patient->estado_civil) }}</td>
                    <td>
                        <a href="{{ route('patients.show', $patient) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este paciente?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $patients->links() }} <!-- Para la paginación, si la has implementado -->
</div>
@endsection
